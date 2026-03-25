<?php $v->layout("_admin"); ?>
<?php $v->insert("widgets/empresa/sidebar.php"); ?>

<section class="dash_content_app">
    <?php if (!$post): ?>
        <header class="dash_content_app_header">
            <h2 class="icon-plus-circle">Novos dados da empresa</h2>
        </header>

        <div class="dash_content_app_box">
            <form class="app_form" action="<?= url("/admin/empresa/post"); ?>" method="post">
                <!-- ACTION SPOOFING-->
                <input type="hidden" name="action" value="create"/>

                <label class="label_g2">
                    <label class="label">
                        <span class="legend">*Ano:</span>
                        <input type="number" name="year" placeholder="Ano" required/>
                    </label>

                    <label class="label">
                        <span class="legend">*Colaboradores:</span>
                        <input type="text" name="employee" placeholder="Colaboradores" required/>
                    </label>
                </label>

                <label class="label_g2">
                    <label class="label">
                        <span class="legend">*Unidades:</span>
                        <input type="number" name="units" placeholder="Unidades" required/>
                    </label>

                    <label class="label">
                        <span class="legend">*Paças em estoque:</span>
                        <input type="text" name="parts" placeholder="Peças em estoque" required/>
                    </label>
                </label>

                <label class="label_g2">
                    <label class="label">
                        <span class="legend">*Tipos de produtos:</span>
                        <input type="text" name="product_type" placeholder="Tipos de produtos" required/>
                    </label>

                    <label class="label">
                        <span class="legend">*Clientes:</span>
                        <input type="text" name="clients" placeholder="Clientes" required/>
                    </label>
                </label>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">*Status:</span>
                        <select name="status" required>
                            <option value="post">Publicar</option>
                            <option value="draft">Rascunho</option>
                            <option value="trash">Lixo</option>
                        </select>
                    </label>

                    <label class="label">
                        <span class="legend">Data de publicação:</span>
                        <input class="mask-datetime" type="text" name="post_at" value="<?= date("d/m/Y H:i"); ?>"
                               required/>
                    </label>
                </div>

                <div class="al-right">
                    <button class="btn btn-green icon-check-square-o">Publicar</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <header class="dash_content_app_header">
            <h2 class="icon-pencil-square-o">Editar post #<?= $post->id; ?></h2>
            <a class="icon-link btn btn-green" href="<?= url("/empresa/{$post->uri}"); ?>" target="_blank" title="">Ver no
                site</a>
        </header>

        <div class="dash_content_app_box">
            <form class="app_form" action="<?= url("/admin/empresa/post/{$post->id}"); ?>" method="post">
                <!-- ACTION SPOOFING-->
                <input type="hidden" name="action" value="update"/>                

                <label class="label_g2">
                    <label class="label">
                        <span class="legend">*Ano:</span>
                        <input type="number" name="year" value="<?= $post->year; ?>" placeholder="Ano" required/>
                    </label>

                    <label class="label">
                        <span class="legend">*Colaboradores:</span>
                        <input type="text" name="employee" value="<?= $post->employee; ?>" placeholder="Colaboradores" required/>
                    </label>
                </label>

                <label class="label_g2">
                    <label class="label">
                        <span class="legend">*Unidades:</span>
                        <input type="number" name="units" value="<?= $post->units; ?>" placeholder="Unidades" required/>
                    </label>

                    <label class="label">
                        <span class="legend">*Paças em estoque:</span>
                        <input type="text" name="parts" value="<?= $post->parts; ?>" placeholder="Peças em estoque" required/>
                    </label>
                </label>

                <label class="label_g2">
                    <label class="label">
                        <span class="legend">*Tipos de produtos:</span>
                        <input type="text" name="product_type" value="<?= $post->product_type; ?>" placeholder="Tipos de produtos" required/>
                    </label>

                    <label class="label">
                        <span class="legend">*Clientes:</span>
                        <input type="text" name="clients" value="<?= $post->clients; ?>" placeholder="Clientes" required/>
                    </label>
                </label>

                <div class="label_g2">
                    <label class="label">
                        <span class="legend">*Status:</span>
                        <select name="status" required>
                            <?php
                            $status = $post->status;
                            $select = function ($value) use ($status) {
                                return ($status == $value ? "selected" : "");
                            };
                            ?>
                            <option <?= $select("post"); ?> value="post">Publicar</option>
                            <option <?= $select("draft"); ?> value="draft">Rascunho</option>
                            <option <?= $select("trash"); ?> value="trash">Lixo</option>
                        </select>
                    </label>

                    <label class="label">
                        <span class="legend">Data de publicação:</span>
                        <input class="mask-datetime" type="text" name="post_at"
                               value="<?= date_fmt($post->post_at, "d/m/Y H:i"); ?>" required/>
                    </label>
                </div>

                <div class="al-right">
                    <button class="btn btn-blue icon-pencil-square-o">Atualizar</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
</section>