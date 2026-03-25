<?php $v->layout("_theme"); ?>
    <section class="catalog_page">
        <h3>Produtos</h3>
    </section>
    <section class="products content">
        <?php foreach ($category as $cat): ?>
        <article>
            <header>
                <a href="<?= url("/detalhes/{$cat->id}"); ?>"><img src="<?= image($cat->cover, 295); ?>"></a>
                <h4><?= $cat->title ;?></h4>
            </header>
        </article>
        <?php endforeach; ?>
    </section>
