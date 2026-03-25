<?php


namespace Source\App\Admin;

use Source\Models\Histories;
use Source\Models\User;
use Source\Support\Pager;
use Source\Support\Thumb;
use Source\Support\Upload;

class History extends Admin
{
    /**
     * History constructor.
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
            echo json_encode(["redirect" => url("/admin/historia/home/{$s}/1")]);
            return;
        }

        $search = null;
        $posts = (new Histories())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $posts = (new Product())->find("MATCH(title, subtitle) AGAINST(:s)", "s={$search}");
            if (!$posts->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/admin/historia/home");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/admin/historia/home/{$all}/"));
        $pager->pager($posts->count(), 12, (!empty($data["page"]) ? $data["page"] : 1));

        $head = $this->seo->render(
            CONF_SITE_NAME . " | História",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/historia/home", [
            "app" => "historia/home",
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
            $content = $data["content"];
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $historyCreate = new Histories();
            $historyCreate->title = $data["title"];
            $historyCreate->content = str_replace(["{title}"], [$historyCreate->title], $content);            
            $historyCreate->status = $data["status"];
            $historyCreate->post_at = date_fmt_back($data["post_at"]);

            //upload cover
            if (!empty($_FILES["cover"])) {
                $files = $_FILES["cover"];
                $upload = new Upload();
                $image = $upload->image($files, $historyCreate->title);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $historyCreate->cover = $image;
            }
            

            if (!$historyCreate->save()) {
                $json["message"] = $historyCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Dados da historia publicado com sucesso...")->flash();
            $json["redirect"] = url("/admin/historia/post/{$historyCreate->id}");

            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $content = $data["content"];
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $historyEdit = (new Histories())->findById($data["post_id"]);

            if (!$historyEdit) {
                $this->message->error("Você tentou atualizar um dado da historia que não existe ou foi removido")->flash();
                echo json_encode(["redirect" => url("/admin/historia/home")]);
                return;
            }
            
            $historyEdit->title = $data["title"];
            $historyEdit->content = str_replace(["{title}"], [$historyEdit->title], $content);
            $historyEdit->status = $data["status"];
            $historyEdit->post_at = date_fmt_back($data["post_at"]);

            //upload cover
            if (!empty($_FILES["cover"])) {
                if ($historyEdit->cover && file_exists(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$historyEdit->cover}")) {
                    unlink(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$historyEdit->cover}");
                    (new Thumb())->flush($historyEdit->cover);
                }

                $files = $_FILES["cover"];
                $upload = new Upload();
                $image = $upload->image($files, $historyEdit->title);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $historyEdit->cover = $image;
            }


            if (!$historyEdit->save()) {
                $json["message"] = $historyEdit->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Dados da historia atualizados com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $historyDelete = (new Histories())->findById($data["post_id"]);

            if (!$historyDelete) {
                $this->message->error("Você tentou excluir um dado da historia que não existe ou já foi removido")->flash();
                echo json_encode(["reload" => true]);
                return;
            }

            if ($historyDelete->cover && file_exists(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$historyDelete->cover}")) {
                unlink(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$historyDelete->cover}");
                (new Thumb())->flush($historyDelete->cover);
            }

            $historyDelete->destroy();
            $this->message->success("Os dados da historia foram excluído com sucesso...")->flash();

            echo json_encode(["reload" => true]);
            return;
        }

        $historyEdit = null;
        if (!empty($data["post_id"])) {
            $historyId = filter_var($data["post_id"], FILTER_VALIDATE_INT);
            $historyEdit = (new Histories())->findById($historyId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($historyEdit->title ?? "Nova história da empresa"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/historia/post", [
            "app" => "historia/post",
            "head" => $head,
            "post" => $historyEdit
        ]);
    }
}