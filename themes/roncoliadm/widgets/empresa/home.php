<?php $v->layout("_admin"); ?>
<?php $v->insert("widgets/empresa/sidebar.php"); ?>

<section class="dash_content_app">
    <header class="dash_content_app_header">
        <h2 class="icon-pencil-square-o">Empresa</h2>
    </header>

    <div class="dash_content_app_box">
        <section>
            <div class="app_blog_home">
                <?php if (!$posts): ?>
                    <div class="message info icon-info">Ainda não existem dados da empresa cadastrados no site.</div>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <article>                            
                            <h3 class="tittle">
                                <a target="_blank" href=" <?= url("/empresa/{$post->uri}"); ?>">
                                    <?php if ($post->post_at > date("Y-m-d H:i:s")): ?>
                                        <span class="icon-clock-o"><?= $post->title; ?></span>
                                    <?php else: ?>
                                        <span class="icon-check"><?= $post->title; ?></span>
                                    <?php endif; ?>
                                </a>
                            </h3>

                            <div class="info">
                                <p class="icon-clock-o"><?= date_fmt($post->post_at, "d.m.y \à\s H\hi"); ?></p>
                                <p class="icon-pencil-square-o"><?= ($post->status == "post" ? "Empresa" : ($post->status == "draft" ? "Rascunho" : "Lixo")); ?></p>
                            </div>

                            <div class="actions">
                                <a class="icon-pencil btn btn-blue" title=""
                                   href="<?= url("/admin/empresa/post/{$post->id}"); ?>">Editar</a>

                                <a class="icon-trash-o btn btn-red" title="" href="#"
                                   data-post="<?= url("/admin/empresa/post"); ?>"
                                   data-action="delete"
                                   data-confirm="Tem certeza que deseja deletar essa empresa?"
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