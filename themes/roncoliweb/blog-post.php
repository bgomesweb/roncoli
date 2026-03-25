<?php $v->layout("_theme"); ?>

    <article class="post_page">
        <header class="post_page_header">
            <div class="post_page_hero">
                <h1><?= $post->title; ?></h1>
                <img class="post_page_cover" alt="<?= $post->title; ?>" title="<?= $post->title; ?>"
                     src="<?= image($post->cover, 1280); ?>"/>
                <div class="post_page_meta">                    
                    <div class="date">Dia <?= date_fmt($post->post_at); ?></div>
                </div>
            </div>
        </header>

        <div class="post_page_content">
            <div class="htmlchars">
                <h2><?= $post->subtitle; ?></h2>
                <?= html_entity_decode($post->content); ?>
            </div>            
        </div>

        <?php if (!empty($related)): ?>
            <div class="post_page_related content">
                <section>
                    <header class="post_page_related_header">
                        <h4>Veja também:</h4>
                        <p>Confira mais eventos que a Roncoli já realizou.</p>
                    </header>

                    <div class="blog_articles">
                        <?php foreach ($related as $more): ?>
                            <?php $v->insert("blog-list", ["post" => $more]); ?>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        <?php endif; ?>
    </article>

<?php $v->start("scripts"); ?>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php $v->end(); ?>