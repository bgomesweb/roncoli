<?php $v->layout("_admin"); ?>
<?php $v->insert("widgets/produtos/sidebar.php"); ?>

<section class="dash_content_app">
    <?php if (!$category): ?>
        <header class="dash_content_app_header">
            <h2 class="icon-plus-circle">Nova Sub Categoria</h2>
        </header>

        <div class="dash_content_app_box">
            <form class="app_form" action="<?= url("/admin/produtos/subcategory"); ?>" method="post">
                <!--ACTION SPOOFING-->
                <input type="hidden" name="action" value="create"/>

                <label class="label">
                    <span class="legend">*Título:</span>
                    <input type="text" name="title" placeholder="O nome da sub-categoria" required/>
                </label>

                <label class="label">
                    <span class="legend">*Categoria:</span>
                    <select name="category" required>
                        <?php foreach ($categories as $category):
                            $categoryId = $post->category;
                            $select = function ($value) use ($categoryId) {
                                return ($categoryId == $value ? "selected" : "");
                            };
                            ?>
                            <option <?= $select($category->id); ?>
                                    value="<?= $category->id; ?>"><?= $category->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <div class="al-right">
                    <button class="btn btn-green icon-check-square-o">Criar Categoria</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <header class="dash_content_app_header">
            <h2 class="icon-bookmark-o"><?= $category->title; ?></h2>
            <a class="icon-link btn btn-green" href="<?= url("/produtos/em/{$category->uri}"); ?>" target="_blank"
               title="">Ver no site</a>
        </header>

        <div class="dash_content_app_box">
            <form class="app_form" action="<?= url("/admin/produtos/subcategory/{$category->id}"); ?>" method="post">
                <!--ACTION SPOOFING-->
                <input type="hidden" name="action" value="update"/>

                <label class="label">
                    <span class="legend">*Título:</span>
                    <input type="text" name="title" value="<?= $category->title; ?>"
                           placeholder="O nome da categoria" required/>
                </label>

                <label class="label">
                    <span class="legend">*Categoria:</span>
                    <select name="category" required>
                        <?php foreach ($categories as $category):
                            $categoryId = $post->category;
                            $select = function ($value) use ($categoryId) {
                                return ($categoryId == $value ? "selected" : "");
                            };
                            ?>
                            <option <?= $select($category->id); ?>
                                    value="<?= $category->id; ?>"><?= $category->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <div class="al-right">
                    <button class="btn btn-blue icon-check-square-o">Atualizar</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
</section>