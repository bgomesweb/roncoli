<?php $v->layout("_theme"); ?>
    <section class="catalog_page">
        <h3>Entrar</h3>
    </section>
<?php $v->layout("_theme"); ?>

<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1 class="icon-user-plus">Area do Cliente</h1>
            <img src="<?= theme("/assets/images/border-login.png");?>">
        </header>

        <form class="auth_form" action="<?= url("/entrar"); ?>" method="post" enctype="multipart/form-data">
            <div class="ajax_response"><?= flash(); ?></div>
            <?= csrf_input(); ?>

            <label>
                <div><span>CNPJ/CPF:</span></div>
                <input type="text" name="document" value="<?= ($cookie ?? null); ?>" placeholder="Informe seu CNPJ/CPF:"
                       required/>
            </label>

            <label>
                <div>
                    <span>Senha:</span>
                </div>
                <input type="password" name="password" placeholder="Informe sua senha:" required/>
            </label>

            <div class="auth_login">
                <span><a title="Cadastre-se" href="<?= url("/cadastrar"); ?>">Ainda não é cliente?<br><span class="register">Cadastre-se</span></a></span>
                <span><a title="Esqueceu a senha?" href="<?= url("/recuperar"); ?>">Esqueci minha senha</a></span>
                <button class="auth_form_btn transition gradient gradient-blue gradient-hover">Entrar</button>
            </div>
        </form>
    </div>
</article>