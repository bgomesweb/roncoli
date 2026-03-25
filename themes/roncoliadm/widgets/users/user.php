<?php $v->layout("_admin"); ?>
<?php $v->insert("widgets/users/sidebar.php"); ?>

<section class="dash_content_app">
    <?php if (!$user): ?>
        <header class="dash_content_app_header">
            <h2 class="icon-plus-circle">Novo Usuário</h2>
        </header>

        <div class="dash_content_app_box">
            <form class="app_form" action="<?= url("/admin/users/user"); ?>" method="post">
                <!--ACTION SPOOFING-->
                <input type="hidden" name="action" value="create"/>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">*Razão Social:</span>
                        <input type="text" name="company_name" placeholder="Razão Social" required/>
                    </label>

                    <label class="label">
                        <span class="legend">*CNPJ:</span>
                        <input type="text" class="mask-doc" name="cnpj_cpf" placeholder="CNPJ" required/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">IE:</span>
                        <input type="text" class="mask-ie" name="ie_rg" placeholder="IE"/>
                    </label>

                    <label class="label">
                        <span class="legend">Telefone:</span>
                        <input type="text" name="phone" placeholder="Telefone"/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">CEP:</span>
                        <input type="text" name="cep" placeholder="CEP"/>
                    </label>

                    <label class="label">
                        <span class="legend">Endereço:</span>
                        <input type="text" name="address" placeholder="Endereço"/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">Bairro:</span>
                        <input type="text" name="neighborhood" placeholder="Bairro"/>
                    </label>

                    <label class="label">
                        <span class="legend">Cidade:</span>
                        <input type="text" name="city" placeholder="Cidade"/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">Estado:</span>
                        <input type="text" name="state" placeholder="Estado"/>
                    </label>
                </div>

                <label class="label">
                    <span class="legend">*E-mail:</span>
                    <input type="email" name="email" placeholder="Melhor e-mail" required/>
                </label>

                <label class="label">
                    <span class="legend">Foto: (600x600px)</span>
                    <input type="file" name="photo"/>
                </label>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">*Senha:</span>
                        <input type="password" name="password" placeholder="Senha de acesso" required/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">*Level:</span>
                        <select name="level" required>
                            <option value="1">Usuário</option>
                            <option value="5">Admin</option>
                        </select>
                    </label>

                    <label class="label">
                        <span class="legend">*Status:</span>
                        <select name="status" required>
                            <option value="registered">Registrado</option>
                            <option value="confirmed">Confirmado</option>
                        </select>
                    </label>
                </div>

                <div class="al-right">
                    <button class="btn btn-green icon-check-square-o">Criar Usuário</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <header class="dash_content_app_header">
            <h2 class="icon-user"><?= $user->fullName(); ?></h2>
        </header>

        <div class="dash_content_app_box">
            <form class="app_form" action="<?= url("/admin/users/user/{$user->id}"); ?>" method="post">
                <!--ACTION SPOOFING-->
                <input type="hidden" name="action" value="update"/>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">*Razão Social:</span>
                        <input type="text" name="company_name" value="<?= $user->company_name; ?>"
                               placeholder="Razão Social" required/>
                    </label>

                    <label class="label">
                        <span class="legend">*CNPJ:</span>
                        <input type="text" class="mask-doc" name="cnpj_cpf" value="<?= $user->cnpj_cpf; ?>" placeholder="CNPJ"
                               required/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">IE:</span>
                        <input type="text" class="mask-ie" name="ie_rg" value="<?= $user->ie_rg; ?>"
                               placeholder="IE"/>
                    </label>

                    <label class="label">
                        <span class="legend">Telefone:</span>
                        <input type="text" name="phone" value="<?= $user->phone; ?>" placeholder="Telefone"/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">CEP:</span>
                        <input type="text" name="cep" value="<?= $user->cep; ?>"
                               placeholder="CEP"/>
                    </label>

                    <label class="label">
                        <span class="legend">Endereço:</span>
                        <input type="text" name="address" value="<?= $user->address; ?>" placeholder="Endereço"/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">Bairro:</span>
                        <input type="text" name="neighborhood" value="<?= $user->neighborhood; ?>"
                               placeholder="Bairro"/>
                    </label>

                    <label class="label">
                        <span class="legend">Cidade:</span>
                        <input type="text" name="city" value="<?= $user->city; ?>" placeholder="Cidade"/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">Estado:</span>
                        <input type="text" name="state" value="<?= $user->state; ?>"
                               placeholder="Estado"/>
                    </label>
                </div>

                <label class="label">
                    <span class="legend">*E-mail:</span>
                    <input type="email" name="email" value="<?= $user->email; ?>" placeholder="Melhor e-mail"
                           required/>
                </label>

                <label class="label">
                    <span class="legend">Foto: (600x600px)</span>
                    <input type="file" name="photo"/>
                </label>


                <div class="label_g2">
                    <label class="label">
                        <span class="legend">Alterar Senha:</span>
                        <input type="password" name="password" placeholder="Senha de acesso"/>
                    </label>
                </div>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">*Level:</span>
                        <select name="level" required>
                            <?php
                            $level = $user->level;
                            $select = function ($value) use ($level) {
                                return ($level == $value ? "selected" : "");
                            };
                            ?>
                            <option <?= $select(1); ?> value="1">Usuário</option>
                            <option <?= $select(5); ?> value="5">Admin</option>
                        </select>
                    </label>

                    <label class="label">
                        <span class="legend">*Status:</span>
                        <select name="status" required>
                            <?php
                            $status = $user->status;
                            $select = function ($value) use ($status) {
                                return ($status == $value ? "selected" : "");
                            };
                            ?>
                            <option <?= $select("registered"); ?> value="registered">Registrado</option>
                            <option <?= $select("confirmed"); ?> value="confirmed">Confirmado</option>
                        </select>
                    </label>
                </div>

                <div class="app_form_footer">
                    <button class="btn btn-blue icon-check-square-o">Atualizar</button>
                    <a href="#" class="remove_link icon-warning"
                       data-post="<?= url("/admin/users/user/{$user->id}"); ?>"
                       data-action="delete"
                       data-confirm="ATENÇÃO: Tem certeza que deseja excluir o usuário e todos os dados relacionados a ele? Essa ação não pode ser feita!"
                       data-user_id="<?= $user->id; ?>">Excluir Usuário</a>
                </div>
            </form>
        </div>
    <?php endif; ?>
</section>