<?php


namespace Source\App;


use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Auth;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;
use Source\Support\Thumb;
use Source\Support\Upload;

/**
 * Class App
 * @package Source\App
 */
class App extends Controller
{
    /** @var user */
    private $company;

    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

        if (!$this->company = Auth::user()) {
            $this->message->warning("Efetue login para acessar o APP.")->flash();
            redirect("/entrar");
        }

        (new Access())->report();
        (new Online())->report();


        //UNCONFIRMED EMAIL
        if ($this->company->status != "confirmed") {
            $session = new Session();
            if (!$session->has("appconfirmed")) {
                $this->message->info("IMPORTANTE: Acesse seu e-mail para confirmar seu cadastro e ativar todos os recursos.")->flash();
                $session->set("appconfirmed", true);
                (new Auth())->register($this->company);
            }
        }
    }

    /**
     * APP HOME
     */
    public function home(): void
    {
        $head = $this->seo->render(
            "Olá {$this->company->company_name}. - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("home", [
            "head" => $head
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function profile(?array $data): void
    {
        if (!empty($data["update"])) {
            $company = (new User())->findById($this->company->id);
            $company->cnpj_cpf = $data["cnpj_cpf"];
            $company->ie_rg = $data["ie_rg"];
            $company->company_name = $data["company_name"];
            $company->email = $data["email"];
            $company->phone = $data["phone"];
            $company->cep = $data["cep"];
            $company->address = $data["address"];
            $company->neighborhood = $data["neighborhood"];
            $company->city = $data["city"];
            $company->state = $data["state"];
            $company->cep = $data["cep"];

            if (!empty($_FILES["photo"])) {
                $file = $_FILES["photo"];
                $upload = new Upload();

                if ($this->company->photo()) {
                    (new Thumb())->flush("storage/{$this->company->photo}");
                    $upload->remove("storage/{$this->company->photo}");
                }

                if (!$company->photo = $upload->image($file, "{$company->company_name_name} " . time(), 360)) {
                    $json["message"] = $upload->message()->before("Ooops {$this->company->company_name}! ")->after(".")->render();
                    echo json_encode($json);
                    return;
                }
            }

            if (!empty($data["password"])) {
                if (empty($data["password_re"]) || $data["password"] != $data["password_re"]) {
                    $json["message"] = $this->message->warning("Para alterar sua senha, informa e repita a nova senha!")->render();
                    echo json_encode($json);
                    return;
                }

                $company->password = $data["password"];
            }

            if (!$company->save()) {
                $this->message->success("Pronto {$this->company->company_name}. Seus dados foram atualizados com sucesso!")->flash();
                $json["reload"] = true;
            }
        }

        $head = $this->seo->render(
            "Meu perfil - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("profile", [
            "head" => $head,
            "company" => $this->company,
            "photo" => ($this->company->photo() ? image($this->company->photo, 360, 360) :
                theme("/assets/images/avatar.jpg", CONF_VIEW_APP))
        ]);
    }

    public function billet(): void
    {
        function truncate($string, $tamanho) {
            return substr($string, 0, $tamanho);
        }

        function extract_numbers($string){
            return preg_replace("/[^0-9]/", "", $string);
        }

        function tipo_cliente($string){
            if (strlen(extract_numbers($string))>11) {
                return "02";
            } else {
                return "01";
            }
        }

        $user = (new User())->findById($this->company->id);
        $cripto = new Itaucripto();

        $pedido = truncate("12345678", 8);// Identificacao do pedido - maximo de 8 digitos (12345678) - Obrigatario
        $valor = truncate("1,99", 8);// Valor do pedido - maximo de 8 digitos + virgula + 2 digitos - 99999999,99 - Obrigatario
        $observacao = truncate("-", 40);// Observacoes - maximo de 40 caracteres
        $nomeSacado = truncate($user->company_name, 30);// Nome do sacado - maximo de 30 caracteres
        $codigoInscricao = truncate(tipo_cliente($user->cnpj_cpf), 2);// Codigo de Inscricao: 01->CPF, 02->CNPJ
        $numeroInscricao = truncate(extract_numbers($user->cnpj_cpf), 14);// Numero de Inscricao: CPF ou CNPJ - ate 14 caracteres
        $enderecoSacado = truncate($user->address, 40);// Endereco do Sacado - maximo de 40 caracteres
        $bairroSacado = truncate("", 15);// Bairro do Sacado - maximo de 15 caracteres
        $cepSacado = truncate("", 8);// Cep do Sacado - maximo de 8 digitos
        $cidadeSacado = truncate("", 15);// Cidade do sacado - maximo 15 caracteres
        $estadoSacado = truncate($user->state, 2);// Estado do Sacado - 2 caracteres
        $dataVencimento = truncate("", 8);// Vencimento do titulo - 8 digitos - ddmmaaaa
        $urlRetorna = truncate("http://www.roncoli.com.br/boletos", 60);// URL do retorno - maximo de 60 caracteres
        $obsAd1 = truncate("", 60);// ObsAdicional1 - maximo de 60 caracteres
        $obsAd2 = truncate("", 60);// ObsAdicional1 - maximo de 60 caracteres
        $obsAd3 = truncate("", 60);// ObsAdicional1 - maximo de 60 caracteres

        $urlSend = "https://ww2.itau.com.br/2viabloq/pesquisa.asp";
        $urlXML = "https://ww2.itau.com.br/2viabloq/2ViaXMLWebSvc.asmx/PesquisaXML";

        //Roncoli Rio Claro
        $codEmp = "J0564938770001160000000001";
        $chave = "QHP37CB81SP2DG62";
        $roncolirc = $cripto->geraDados($codEmp, $pedido, $valor, $observacao, $chave, $nomeSacado, $codigoInscricao, $numeroInscricao, $enderecoSacado, $bairroSacado, $cepSacado, $cidadeSacado, $estadoSacado, $dataVencimento, $urlRetorna, $obsAd1, $obsAd2, $obsAd3);

        //Roncoli Limeira
        $codEmp = "J0564938770003880000000001";
        $chave = "GUA9BML3S461CP85";
        $roncolilimeira = $cripto->geraDados($codEmp, $pedido, $valor, $observacao, $chave, $nomeSacado, $codigoInscricao, $numeroInscricao, $enderecoSacado, $bairroSacado, $cepSacado, $cidadeSacado, $estadoSacado, $dataVencimento, $urlRetorna, $obsAd1, $obsAd2, $obsAd3);

        //Roncoli Araras
        $codEmp = "J0564938770002050000000001";
        $chave = "4GM63AU5XB7UL6AF";
        $roncoliararas = $cripto->geraDados($codEmp, $pedido, $valor, $observacao, $chave, $nomeSacado, $codigoInscricao, $numeroInscricao, $enderecoSacado, $bairroSacado, $cepSacado, $cidadeSacado, $estadoSacado, $dataVencimento, $urlRetorna, $obsAd1, $obsAd2, $obsAd3);

        //Roncoli São José dos Campos
        $codEmp = "J0564938770004690000000001";
        $chave = "TRE13AJM94SK6FM2";
        $roncolisjc = $cripto->geraDados($codEmp, $pedido, $valor, $observacao, $chave, $nomeSacado, $codigoInscricao, $numeroInscricao, $enderecoSacado, $bairroSacado, $cepSacado, $cidadeSacado, $estadoSacado, $dataVencimento, $urlRetorna, $obsAd1, $obsAd2, $obsAd3);

        //Mangueiras 3R Rio Claro
        $codEmp = "J0016072460001990000000001";
        $chave = "HP34AM8ER25GB6AL";
        $mangrc = $cripto->geraDados($codEmp, $pedido, $valor, $observacao, $chave, $nomeSacado, $codigoInscricao, $numeroInscricao, $enderecoSacado, $bairroSacado, $cepSacado, $cidadeSacado, $estadoSacado, $dataVencimento, $urlRetorna, $obsAd1, $obsAd2, $obsAd3);
        //Mangueiras 3R Piracicaba
        $codEmp = "J0016072460002700000000001";
        $chave = "MU35EMT7ZP62SK1N";
        $mangpirac = $cripto->geraDados($codEmp, $pedido, $valor, $observacao, $chave, $nomeSacado, $codigoInscricao, $numeroInscricao, $enderecoSacado, $bairroSacado, $cepSacado, $cidadeSacado, $estadoSacado, $dataVencimento, $urlRetorna, $obsAd1, $obsAd2, $obsAd3);

        $head = $this->seo->render(
            "Boletos",
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("billet", [
            "head" => $head,
            "roncolirc" => $roncolirc,
            "roncolilimeira" => $roncolilimeira,
            "roncoliararas" => $roncoliararas,
            "roncolisjc" => $roncolisjc,
            "mangrc" => $mangrc,
            "mangpirac" => $mangpirac,
            "urlSend" => $urlSend
        ]);
    }

    /**
     * APP LOGOUT
     */
    public function logout(): void
    {
        $this->message->info("Você saiu com sucesso " . Auth::user()->company_name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/entrar");
    }
}