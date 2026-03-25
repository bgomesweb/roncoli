<?php $v->layout("_theme"); ?>
    <div class="app_main_box">
        <section class="app_main_left">
            <article class="app_widget">
                <header class="app_widget_title">
                    <h2 class="icon-tags">Meus Boletos</h2>
                </header>
                <div class="app_widget_content">
                    <div class="app_widget_content_billet">
                        <form action="<?= $urlSend;?>" method="post" onsubmit="carregabrw()" target="BLOQUETO" name="form">
                            <input type="hidden" name="DC" value="<?= $roncolirc;?>" />
                            <div class="box-img-btn-boletos wp100 pd20 dtc verticalm td3">
                                <img src="<?= theme("/assets/images/logo_roncoli.png", CONF_VIEW_APP);?>">
                            </div>
                            <p>Rio Claro</p>
                            <button type="submit" class="btn btn-blue">
                                <div class="wp100 btn-boletos dt">
                                    <div class="btn btn-blue">
                                        Imprimir Boleto
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="app_widget_content_billet">
                        <form action="<?= $urlSend;?>" method="post" onsubmit="carregabrw()" target="BLOQUETO" name="form">
                            <input type="hidden" name="DC" value="<?= $roncolilimeira;?>" />
                            <div class="box-img-btn-boletos wp100 pd20 dtc verticalm td3">
                                <img src="<?= theme("/assets/images/logo_roncoli.png", CONF_VIEW_APP);?>">
                            </div>
                            <p>Limeira</p>
                            <button type="submit" class="btn btn-blue">
                                <div class="wp100 btn-boletos dt">
                                    <div class="btn btn-blue">
                                        Imprimir Boleto
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="app_widget_content_billet">
                        <form action="<?= $urlSend;?>" method="post" onsubmit="carregabrw()" target="BLOQUETO" name="form">
                            <input type="hidden" name="DC" value="<?= $roncoliararas;?>" />
                            <div class="box-img-btn-boletos wp100 pd20 dtc verticalm td3">
                                <img src="<?= theme("/assets/images/logo_roncoli.png", CONF_VIEW_APP);?>">
                            </div>
                            <p>Araras</p>
                            <button type="submit" class="btn btn-blue">
                                <div class="wp100 btn-boletos dt">
                                    <div class="btn btn-blue">
                                        Imprimir Boleto
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="app_widget_content_billet">
                        <form action="<?= $urlSend;?>" method="post" onsubmit="carregabrw()" target="BLOQUETO" name="form">
                            <input type="hidden" name="DC" value="<?= $roncolisjc;?>" />
                            <div class="box-img-btn-boletos wp100 pd20 dtc verticalm td3">
                                <img src="<?= theme("/assets/images/logo_roncoli.png", CONF_VIEW_APP);?>">
                            </div>
                            <p>São José dos Campos</p>
                            <button type="submit" class="btn btn-blue">
                                <div class="wp100 btn-boletos dt">
                                    <div class="btn btn-blue">
                                        Imprimir Boleto
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="app_widget_content_billet">
                        <form action="<?= $urlSend;?>" method="post" onsubmit="carregabrw()" target="BLOQUETO" name="form">
                            <input type="hidden" name="DC" value="<?= $mangrc;?>" />
                            <div class="box-img-btn-boletos wp100 pd20 dtc verticalm td3">
                                <img src="<?= theme("/assets/images/logo_mangueiras.png", CONF_VIEW_APP);?>">
                            </div>
                            <p>Rio Claro</p>
                            <button type="submit" class="btn btn-blue">
                                <div class="wp100 btn-boletos dt">
                                    <div class="btn btn-blue">
                                        Imprimir Boleto
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="app_widget_content_billet">
                        <form action="<?= $urlSend;?>" method="post" onsubmit="carregabrw()" target="BLOQUETO" name="form">
                            <input type="hidden" name="DC" value="<?= $mangpirac;?>" />
                            <div class="box-img-btn-boletos wp100 pd20 dtc verticalm td3">
                                <img src="<?= theme("/assets/images/logo_mangueiras.png", CONF_VIEW_APP);?>">
                            </div>
                            <p>Piracicaba</p>
                            <button type="submit" class="btn btn-blue">
                                <div class="wp100 btn-boletos dt">
                                    <div class="btn btn-blue">
                                        Imprimir Boleto
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
                <div id="control"></div>
            </article>
        </section>
    </div>
    <?php $v->start("scripts"); ?>
        <script>
            function carregabrw() {
                window.open('', 'BLOQUETO', 'toolbar=yes,menubar=yes,resizable=yes,status=no,scrollbars=yes,left=0,top=0,width=600,height=430');
            }
        </script>
    <?php $v->end(); ?>