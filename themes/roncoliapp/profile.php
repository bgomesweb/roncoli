<?php $v->layout("_theme"); ?>

<div class="app_formbox app_widget">
    <form class="app_form" action="<?= url("/app/profile"); ?>" method="post">
        <input type="hidden" name="update" value="true"/>

        <div class="app_formbox_photo">
            <div class="rounded j_profile_image thumb" style="background-image: url('<?= $photo; ?>')"></div>
            <div><input data-image=".j_profile_image" type="file" class="radius"  name="photo"/></div>
        </div>

        <div class="label_group">
            <label>
                <span class="field">Razão Social:</span>
                <input class="radius" type="text" name="company_name" required
                       value="<?= $company->company_name; ?>"/>
            </label>

            <label>
                <span class="field">CNPJ/CPF:</span>
                <input class="radius" type="number" name="cnpj_cpf" required
                       value="<?= $company->cnpj_cpf; ?>"/>
            </label>
        </div>
        <div class="label_group">
            <label>
                <span class="field">IE/RG:</span>
                <input class="radius" type="number" name="ie_rg"
                       value="<?= $company->ie_rg; ?>"/>
            </label>

            <label>
                <span class="field">Telefone:</span>
                <input class="radius" type="text" name="phone" required
                       value="<?= $company->phone; ?>"/>
            </label>
        </div>
        <div class="label_group">
            <label>
                <span class="field">CEP:</span>
                <input class="radius" type="text" name="cep" placeholder="CEP"
                       value="<?= $company->cep; ?>"/>
            </label>

            <label>
                <span class="field">Endereço:</span>
                <input class="radius" type="text" name="address" placeholder="Endereço"
                       value="<?= $company->address; ?>"/>
            </label>
        </div>
        <div class="label_group">
            <label>
                <span class="field">Bairro:</span>
                <input class="radius" type="text" name="neighborhood" placeholder="Bairro"
                       value="<?= $company->neighborhood; ?>"/>
            </label>
            <label>
                <span class="field">Cidade:</span>
                <input class="radius" type="text" name="city" placeholder="Cidade"
                       value="<?= $company->city; ?>"/>
            </label>
        </div>
        <div class="label_group">
            <label>
                <span class="field">Estado:</span>
                <input class="radius" type="text" name="state" placeholder="Estado"
                       value="<?= $company->state; ?>"/>
            </label>
        </div>
        <label>
            <span class="field">E-mail:</span>
            <input class="radius" type="email" name="email" placeholder="Seu e-mail" required
                   value="<?= $company->email; ?>"/>
        </label>

        <div class="label_group">
            <label>
                <span class="field">Senha:</span>
                <input class="radius" type="password" name="password" placeholder="Sua senha de acesso"/>
            </label>

            <label>
                <span class="field">Repetir Senha:</span>
                <input class="radius" type="password" name="password_re" placeholder="Sua senha de acesso"/>
            </label>
        </div>

        <div class="al-center">
            <div class="app_formbox_actions">
                <button class="btn btn_inline radius transition icon-pencil-square-o">Atualizar</button>
            </div>
        </div>
    </form>
</div>