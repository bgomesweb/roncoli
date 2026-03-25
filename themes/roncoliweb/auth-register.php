<?php $v->layout("_theme"); ?>

<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1>Cadastre-se</h1>
            <img src="<?= theme("/assets/images/border-login.png");?>">
        </header>

        <form class="auth_form" action="<?= url("/cadastrar"); ?>" method="post" enctype="multipart/form-data">
            <div class="ajax_response"><?= flash(); ?></div>
            <?= csrf_input(); ?>

            <label>
                <div><span>CNPJ/CPF:</span></div>
                <input type="text" class="mask-doc" name="cnpj_cpf" placeholder="CNPJ:" required/>
            </label>

            <label>
                <div><span>Telefone:</span></div>
                <input type="text" name="phone" placeholder="Telefone:" required/>
            </label>

            <label>
                <div><span>Razão Social:</span></div>
                <input type="text" name="company_name" placeholder="Razão Social:" required/>
            </label>

            <label>
                <div><span>Email:</span></div>
                <input type="email" name="email" placeholder="Informe seu e-mail:" required/>
            </label>

            <label>
                <div><span class="icon-unlock-alt">Senha:</span></div>
                <input type="password" name="password" placeholder="Informe sua senha:" required/>
            </label>
            <div class="auth_login">
                <p>Já tem uma conta? <a title="Fazer login!" href="<?= url("/entrar"); ?>">Fazer login!</a></p>
                <button class="auth_form_btn-register transition gradient gradient-blue gradient-hover">Criar conta</button>
            </div>
        </form>
    </div>
</article>