<?php


namespace Source\App\Admin;

use Source\Models\MyCompany;
use Source\Models\User;
use Source\Support\Pager;
use Source\Support\Thumb;
use Source\Support\Upload;

class Company extends Admin
{
    /**
     * Company constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     */
    public function home(?array $data): void
    {
        //search redirect
        if (!empty($data["s"])) {
            $s = str_search($data["s"]);
            echo json_encode(["redirect" => url("/admin/empresa/home/{$s}/1")]);
            return;
        }

        $search = null;
        $posts = (new MyCompany())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $posts = (new Product())->find("MATCH(title, subtitle) AGAINST(:s)", "s={$search}");
            if (!$posts->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/admin/empresa/home");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/admin/empresa/home/{$all}/"));
        $pager->pager($posts->count(), 12, (!empty($data["page"]) ? $data["page"] : 1));

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Empresa",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/empresa/home", [
            "app" => "empresa/home",
            "head" => $head,
            "posts" => $posts->limit($pager->limit())->offset($pager->offset())->order("post_at DESC")->fetch(true),
            "paginator" => $pager->render(),
            "search" => $search
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function post(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            //$content = $data["content"];
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $companyCreate = new MyCompany();
            $companyCreate->year = $data["year"];
            $companyCreate->employee = $data["employee"];
            $companyCreate->units = $data["units"];
            $companyCreate->parts = $data["parts"];
            $companyCreate->product_type = $data["product_type"];
            $companyCreate->clients = $data["clients"];
            $companyCreate->status = $data["status"];
            $companyCreate->post_at = date_fmt_back($data["post_at"]);
            

            if (!$companyCreate->save()) {
                $json["message"] = $companyCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Dados da empresa publicado com sucesso...")->flash();
            $json["redirect"] = url("/admin/empresa/post/{$companyCreate->id}");

            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            //$content = $data["content"];
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $companyEdit = (new MyCompany())->findById($data["post_id"]);

            if (!$companyEdit) {
                $this->message->error("Você tentou atualizar um dado da empresa que não existe ou foi removido")->flash();
                echo json_encode(["redirect" => url("/admin/empresa/home")]);
                return;
            }
            
            $companyEdit->year = $data["year"];
            $companyEdit->employee = $data["employee"];
            $companyEdit->units = $data["units"];
            $companyEdit->parts = $data["parts"];
            $companyEdit->product_type = $data["product_type"];
            $companyEdit->clients = $data["clients"];
            $companyEdit->status = $data["status"];
            $companyEdit->post_at = date_fmt_back($data["post_at"]);


            if (!$companyEdit->save()) {
                $json["message"] = $companyEdit->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Dados da empresa atualizados com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $companyDelete = (new MyCompany())->findById($data["post_id"]);

            if (!$companyDelete) {
                $this->message->error("Você tentou excluir um dado da empresa que não existe ou já foi removido")->flash();
                echo json_encode(["reload" => true]);
                return;
            }

            $companyDelete->destroy();
            $this->message->success("Os dados da empresa foram excluído com sucesso...")->flash();

            echo json_encode(["reload" => true]);
            return;
        }

        $companyEdit = null;
        if (!empty($data["post_id"])) {
            $companyId = filter_var($data["post_id"], FILTER_VALIDATE_INT);
            $companyEdit = (new MyCompany())->findById($companyId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($companyEdit->title ?? "Novo números da emprsa"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/empresa/post", [
            "app" => "empresa/post",
            "head" => $head,
            "post" => $companyEdit
        ]);
    }
}