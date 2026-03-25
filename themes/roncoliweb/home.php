<?php $v->layout("_theme"); ?>
    <div class="bxslider">
        <?php foreach ($slides as $slide): ?>
            <div><a href="<?= $slide->uri;?>" title="<?= $slide->title ;?>" target="_blank"><img src="<?= image($slide->cover, 1920); ?>"></a></div>
        <?php endforeach; ?>
    </div>   

    <!--FEATURES-->
    <div class="home_features">
        <section class="container content">
            <div class="home_features_content">
                <article>
                    <header>
                        <a href="<?= url("/sobre") ;?>"><img alt="Contas a receber" title="Contas a receber"
                             src="<?= theme("/assets/images/icon-roncoli.png"); ?>"/>
                            <h3>Tradição e referência</h3></a>
                        <p>Há mais de 50 anos trabalhando<br> com peças industriais das principais<br> marcas do mercado.</p>
                    </header>
                </article>

                <article class="radius">
                    <header>
                        <a href="<?= url("/produtos") ;?>"><img alt="Contas a pagar" title="Contas a pagar"
                             src="<?= theme("/assets/images/icon-produtos.png"); ?>"/>
                            <h3>Conheça nosso produto</h3></a>
                        <p>São mais de 300 mil itens<br> entre produtos industriais,<br> agrícolas e automotivos</p>
                    </header>
                </article>

                <article class="radius">
                    <header>
                        <a href="<?= url("/contato") ;?>"><img alt="Controle e relatórios" title="Controle e relatórios"
                             src="<?= theme("/assets/images/icon-address.png"); ?>"/>
                            <h3>Visite-nos</h3></a>
                        <p>Unidades em Rio Claro,<br> Piracicaba, Araras, Limeira<br> e São José dos Campos</p>
                    </header>
                </article>
            </div>
        </section>        
    </div>

    <div class="home_features">
        <section class="container content">
            <div class="home_features_content_company">
                <div class="home_features_content_company_numbers">                    
                    <h3>Números da empresa</h3>
                    <img class="border" src="<?= theme("/assets/images/logo_roncoli_branco.png");?>">
                </div> 
                <?php foreach ($company as $c): ?>
                <div class="home_features_content_company_box">
                    <div class="home_features_content_company_box_number">
                        <p class="box_content"><?= $c->year;?></p>
                        <p class="box_title">Anos no mercado</p>
                    </div>
                    <div class="box-sep"></div>
                    <div class="home_features_content_company_box_number">
                        <p class="box_content"><?= $c->employee;?></p>
                        <p class="box_title">Colaboradores</p>
                    </div>
                    <div class="box-sep"></div>
                    <div class="home_features_content_company_box_number">
                        <p class="box_content" id="unity"><?= $c->units;?></p>
                        <p class="box_title">Unidades</p>
                    </div>
                    <div class="box-sep"></div>
                    <div class="home_features_content_company_box_number">
                        <p class="box_content"><?= $c->parts;?></p>
                        <p class="box_title">Peças em estoque</p>
                    </div>
                    <div class="box-sep"></div>
                    <div class="home_features_content_company_box_number">
                        <p class="box_content"><?= $c->product_type;?></p>
                        <p class="box_title">Tipos de produtos</p>
                    </div>
                    <div class="box-sep"></div>
                    <div class="home_features_content_company_box_number">
                        <p class="box_content"><?= $c->clients;?></p>
                        <p class="box_title">Clientes</p>
                    </div>
                </div>                
                <?php endforeach; ?>               
            </div>
        </section>
    </div>


    <div class="home_distributors">
        <section class="container">
            <header>
                <h3>Distribuidor Autorizado</h3>
                <img class="border" src="<?= theme("/assets/images/border.png");?>">
            </header>
        </section>
    </div>

    <section class="container-slide">
        <div class="autoplay">
            <div><img src="<?= theme("/assets/images/ntn.png");?>"></div>
            <div><img src="<?= theme("/assets/images/snr.png");?>"></div>
            <div><img src="<?= theme("/assets/images/nachi.png");?>"></div>
            <div><img src="<?= theme("/assets/images/gates.png");?>"></div>
            <div><img src="<?= theme("/assets/images/camozzi.png");?>"></div>
            <div><img src="<?= theme("/assets/images/ibira.png");?>"></div>
            <div><img src="<?= theme("/assets/images/hch.png");?>"></div>
            <div><img src="<?= theme("/assets/images/kanaflex.png");?>"></div>
            <div><img src="<?= theme("/assets/images/sav.png");?>"></div>
            <div><img src="<?= theme("/assets/images/frm.png");?>"></div>
            <div><img src="<?= theme("/assets/images/iko.png");?>"></div>
            <div><img src="<?= theme("/assets/images/tekbond.png");?>"></div>
            <div><img src="<?= theme("/assets/images/rolmax.png");?>"></div>
        </div>
    </section>

    <section class="container content cont-slides">
        <div class="logo-marcas">
            <article>
                <img src="<?= theme("/assets/images/ntn.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/snr.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/nachi.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/gates.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/camozzi.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/ibira.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/hch.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/kanaflex.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/sav.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/frm.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/iko.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/tekbond.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/rolmax.png");?>">
            </article>
        </div>
    </section>


    <section class="container content cont-marcas">
        <div class="logo-marcas">
            <article>
                <img src="<?= theme("/assets/images/sabo.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/skf.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/nadella.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/ina.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/fag.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/jacto.png");?>">
            </article>
            <article>
                <img src="<?= theme("/assets/images/nsk.png");?>">
            </article>
        </div>
    </section>

    <section class="container content">
        <div class="pay_cards">
            <img src="<?= theme("/assets/images/cards_pay.png");?>">
        </div>
    </section>


<?php $v->start("scripts"); ?>
<script>
    /*$(function(){
        $('.bxslider').bxSlider({
            mode: 'fade',
            captions: true,
            slideWidth: 1400,
            autoplay: true,
            autoplaySpeed: 2000
        });
    });*/

    $(document).ready(function(){
        $('.bxslider').bxSlider({
            mode: 'fade',
            auto: true,
            autoControls: false,
            pause: 3000
        });
    });

    $('.autoplay').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
</script>
<?php $v->end(); ?>

