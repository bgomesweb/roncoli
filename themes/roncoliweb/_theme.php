<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="mit" content="2020-09-14T11:47:13-03:00+186039">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<!--HEADER-->
<header class="main_header">
    <div class="container">
        <div class="main_header_logo">
            <div class="main_header_logo_roncoli">
                <a href="<?= url(); ?>"><img src="<?= theme("/assets/images/logo_roncoli.png") ;?>" alt="Logo Roncoli Rolamentos" title="Logo Roncoli Rolamentos"></a>
            </div>
            <div class="main_header_logo_hose">
                <a href="<?= url(); ?>"><img id="hose" src="<?= theme("/assets/images/logo_mangueiras.png") ;?>" alt="Logo Mangueiras 3R" title="Logo Mangueiras 3R"></a>
            </div>
        </div>
        
        <div class="main_header_search">
            <span>Entre em Contato  <span class="icon-whatsapp radius transition" data-modalopen=".app_modal_contact"></span><a href="https://www.facebook.com/roncolirolamentos" target="_blank"><span class="icon-facebook"></span></a><a href="https://www.instagram.com/roncoli.rioclaro/" target="_blank"><span class="icon-instagram"></span></a></span>
            <input class="search icon-search" type="text" placeholder="Digite sua pesquisa...">
        </div>
    </div>
    <nav class="main_header_nav">
    <span class="main_header_nav_mobile j_menu_mobile_open icon-menu icon-notext radius transition"></span>
    <div class="main_header_nav_links j_menu_mobile_tab">
        <span class="main_header_nav_mobile_close j_menu_mobile_close icon-error icon-notext transition"></span>
        <a class="link transition" title="Home" href="<?= url(); ?>">Home</a>
        
        <div class="dropdown">
            <a class="link transition" title="Empresa" href="#">Empresa</a>
            <div class="dropdown-menu">
                <a class="link transition" title="Apresentação" href="<?= url("/sobre"); ?>">Apresentação</a>
                <a class="link transition" title="Nossa História" href="<?= url("/nossa-historia"); ?>">Nossa História</a>
                <a class="link transition" title="Eventos" href="<?= url("/blog"); ?>">Eventos</a>
            </div>
        </div>
        
        <a class="link transition" title="Produtos" href="<?= url("/produtos"); ?>">Produtos</a>
        <a class="link transition" title="Catálogo" href="<?= url("/catalogos"); ?>">Catálogos</a>
        <a class="link transition" title="Contato" href="<?= url("/contato"); ?>">Contato</a>

        <?php if (\Source\Models\Auth::user()): ?>
            <a class="link login transition icon-coffee" title="Meus Boletos"
               href="<?= url("/app"); ?>">Meus Boletos</a>
        <?php else: ?>
            <a class="link login transition icon-sign-in" title="Entrar"
               href="<?= url("/entrar"); ?>">Boletos</a>
        <?php endif; ?>

        <a class="link transition" title="Contato" href="https://www.rolamentos3r.com.br/?utm_source=mercadolibre&utm_medium=referral&utm_campaign=see_preview_hub" target="_blank">Loja Online</a>
    </div>
</nav>

</header>

<!--CONTENT-->
<main class="main_content">
    <?= $v->section("content"); ?>
</main>

    <!--FOOTER-->
    <footer class="main_footer">
        <div>
            <span data-modalopen=".app_modal_contact"><img  class="whatsapp" src="<?= theme("/assets/images/icon_whats.png") ;?>" /></span>
            <span><a class="link transition" title="Empresa" href="<?= url("/sobre"); ?>"><img  class="about" src="<?= theme("/assets/images/logo_roncoli_flutuante.png") ;?>" /></a></span>
        </div>
        <div class="main_footer_pay">
            <a href="<?= url("/entrar") ;?>">
                <div class="main_footer_pay_billet">
                </div>
            </a>
        </div>
    <section class="main_footer_menu">
        <ul>
            <li><a href="<?= url(); ?>">Home</a></li>
            <li class="sep">|</li>
            <li><a href="<?= url("/sobre"); ?>">Empresa</a></li>
            <li class="sep">|</li>
            <li><a href="<?= url("/produtos"); ?>">Produtos</a></li>
            <li class="sep">|</li>
            <li><a href="<?= url("/catalogos"); ?>">Catálogos</a></li>
            <li class="sep">|</li>
            <li><a href="<?= url("/contato"); ?>">Contato</a></li>
        </ul>
        </section>
        <div class="container content">
            <section class="main_footer_content">
                <article class="main_footer_content_item">
                    <h2>Rio Claro</h2>
                    <p>Roncoli Rolamentos e Retentores Ltda.<br>
                    Av.11,893 - Centro, Rio Claro/SP | CEP:13.500-350<br>
                    <span class="icon-phone">(19) 3522-2300</span></p>
                    <p>Comércio de Mangueiras 3R Ltda.<br>
                        Rua 9,549 - Centro, Rio Claro/SP | CEP:13.500-145<br>
                        <span class="icon-phone">(19) 2112-2320</span></p>
                </article>
                <article class="main_footer_content_item">
                    <h2>São José dos Campos</h2>
                    <p>Roncoli Rolamentos e Retentores Ltda.<br>
                        Rua George Eastman,517 - São José dos Campos/SP <br> CEP:12.237-640
                        <span class="icon-phone">(12) 3206-8703</span></p>
                </article>
                <article class="main_footer_content_item">
                    <h2>Limeira</h2>
                    <p>Roncoli Rolamentos e Retentores Ltda.<br>
                        Av.Comendador Agostinho Prada,155 - Jd Santa Cecília<br> Limeira/SP | CEP:13.480-666
                        <span class="icon-phone">(19) 3453-8353</span></p>
                </article>
            </section>
            <section class="main_footer_content">
                <article class="main_footer_content_item">

                </article>
                <article class="main_footer_content_item">
                    <h2>Araras</h2>
                    <p>Roncoli Rolamentos e Retentores Ltda.<br>
                        Rua Júlio Mesquita,1162 - Centro, Araras/SP <br> CEP:13.600-061
                        <span class="icon-phone">(19) 3541-0310</span></p>
                </article>
                <article class="main_footer_content_item">
                    <h2>Piracicaba</h2>
                    <p>Piramatic (Comércio de Mangueira 3R Ltda.)<br>
                        Av. Cristovão Colombo,2136 - Algodoal, Piracicaba/SP<br>
                        CEP:13.415-227 <span class="icon-phone">(19) 3413-1009</span></p>
                </article>
            </section>
            <?= $v->insert("views/modals"); ?>
        </div>
    </footer>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-19Y4HBLJ05"></script>
<script src="<?= theme("/assets/scripts.js"); ?>"></script>
<?= $v->section("scripts"); ?>
</body>
</html>