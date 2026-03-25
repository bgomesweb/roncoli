<?php $v->layout("_theme"); ?>
    <section class="catalog_page">
        <h3>Produtos</h3>
    </section>

    <!--OPTIN-->
    <article class="home_optin container">
        <div class="details_optin_content container content">
            <div class="details_optin_content_flex_left">
                <?php foreach ($categories as $cat): ?>
                    <nav>
                        <a href="<?= url("/detalhes/{$cat->id}"); ?>"><?= $cat->title ;?></a>
                    </nav>
                <?php endforeach; ?>
            </div>

            <div class="details_optin_content_flex_right">
                <?php if (empty($products)): ?>
                <div class="empty_content">
                    <h3 class="empty_content_title">Ainda estamos trabalhando aqui!</h3>
                    <p class="empty_content_desc">Nossos editores estão cadastrando produtos nessa categoria.</p>
                </div>
                <?php else: ?>
                <?php foreach ($products as $sub): ?>
                    <article>
                        <img src="<?= theme("/assets/images/produto.png");?>">
                        <p style="width: 50%;"><?= $sub->title; ?>: <?= $sub->content; ?></p>
                    </article>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </article>