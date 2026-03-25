<?php $v->layout("_admin"); ?>
<?php $v->insert("widgets/catalogos/sidebar.php"); ?>

<section class="dash_content_app">
    <header class="dash_content_app_header">
        <h2 class="icon-pencil-square-o">Catálogo</h2>
        <form action="<?= url("/admin/catalogos/home"); ?>" method="post" class="app_search_form">
            <input type="text" name="s" value="<?= $search; ?>" placeholder="Pesquisar Catálogo:">
            <button class="icon-search icon-notext"></button>
        </form>
    </header>

    <div class="dash_content_app_box">
        <section>
            <div class="app_blog_home">
                <?php if (!$posts): ?>
                    <div class="message info icon-info">Ainda não existem catálogos cadastrados no site.</div>
                <?php else: ?>
                    <?php foreach ($posts as $post):?>
                        <article>
                            <h3 class="tittle">
                                <a target="_blank" href=" <?= url("/catalogos/{$post->uri}"); ?>">
                                    <?php if ($post->post_at > date("Y-m-d H:i:s")): ?>
                                        <span class="icon-clock-o"><?= $post->title; ?></span>
                                    <?php else: ?>
                                        <span class="icon-check"><?= $post->title; ?></span>
                                    <?php endif; ?>
                                </a>
                            </h3>

                            <div class="info">
                                <p class="icon-clock-o"><?= date_fmt($post->post_at, "d.m.y \à\s H\hi"); ?></p>
                                <p class="icon-user"><?= $post->author()->fullName(); ?></p>
                                <p class="icon-bar-chart"><?= $post->views; ?></p>
                                <p class="icon-pencil-square-o"><?= ($post->status == "post" ? "Catalogo" : ($post->status == "draft" ? "Rascunho" : "Lixo")); ?></p>
                            </div>

                            <div class="actions">
                                <a class="icon-pencil btn btn-blue" title=""
                                   href="<?= url("/admin/catalogos/post/{$post->id}"); ?>">Editar</a>

                                <a class="icon-trash-o btn btn-red" title="" href="#"
                                   data-post="<?= url("/admin/catalogos/post"); ?>"
                                   data-action="delete"
                                   data-confirm="Tem certeza que deseja deletar esse post?"
                                   data-post_id="<?= $post->id; ?>">Deletar</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?= $paginator; ?>
        </section>
    </div>
</section>