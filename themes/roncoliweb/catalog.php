<?php $v->layout("_theme"); ?>
    <section class="catalog_page">
        <h3>Catálogos</h3>
        <div class="catalog_page_content about_content">
            <article>
                <header>
                    <form name="search" action="<?= url("/catalogos/buscar"); ?>" method="post" enctype="multipart/form-data">
                        <input class="search icon-search"  type="text" name="s" placeholder="Digite o que você procura">
                        <button type="submit" class="icon-search"></button>
                    </form>
                </header>
            </article>
        </div>
        <?php if (empty($catalog) && !empty($search)): ?>
            <div class="content content">
                <div class="empty_content">
                    <h3 class="empty_content_title">Sua pesquisa não retornou resultados :/</h3>
                    <p class="empty_content_desc">Você pesquisou por <b><?= $search; ?></b>. Tente outros termos.</p>
                    <a class="empty_content_btn gradient gradient-blue gradient-hover radius"
                       href="<?= url("/catalogos"); ?>" title="Catálogo">...ou volte ao Catálogo</a>
                </div>
            </div>
        <?php elseif (empty($catalog)): ?>
            <div class="content content">
                <div class="empty_content">
                    <h3 class="empty_content_title">Ainda estamos trabalhando aqui!</h3>
                    <p class="empty_content_desc">Nossos editores estão preparando um conteúdo de primeira para você.</p>
                </div>
            </div>
    </section>
<?php else: ?>
    <section class="catalog content">
        <?php foreach ($catalog as $cat): ?>
        <article>
            <header>
                <img src="<?= theme("/assets/images/pdf.png");?>">
                <h4><?= $cat->title ;?></h4>
                <a href="<?= download("$cat->cover");?>" class="btn btn-download" target="_blank">Download</a>
            </header>
        </article>
        <?php endforeach; ?>
    </section>
    <?= $paginator; ?>
<?php endif; ?>