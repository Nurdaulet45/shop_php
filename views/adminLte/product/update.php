<?php include(ROOT . '/views/layouts/admin_header.php'); ?>
    <section class="content-header">
        <h1>Управление категориями</h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard"> Админ панель</i></a></li>
            <li class="/admin/product">Управление товарами</li>
            <li class="active">Редактировать товарами</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="#"
                          method="post" data-toggle="validator" id="add">
                        <div class="box-body">

                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>


                            <div class="form-group has-feedback">
                                <label for="name">Наименование товара</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Наименование товара" value="<?php echo $product['name']; ?>"
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="code">Артикул</label>
                                <input type="text" name="code" class="form-control" id="code"
                                       placeholder="Ключевые слова" value="<?php echo $product['code']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Цена, $</label>
                                <input type="text" name="price" class="form-control" id="price"
                                       placeholder="Ключевые слова" value="<?php echo $product['price']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="title">Категория товара</label>

                                <select name="category_id" class="form-control" required>
                                    <?php if (is_array($categoryList)): ?>
                                        <?php foreach ($categoryList as $category): ?>
                                            <option value="<?php echo $category['id']; ?>">
                                                <?php echo $category['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="brand">Производитель</label>
                                <input type="text" name="brand" class="form-control" id="brand"
                                       placeholder="Ключевые слова" value="<?php echo $product['brand']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение товара</label>
                                <input type="file" name="image" class="form-control" id="image"
                                       placeholder="Ключевые слова" value="<?php echo $product['image']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" id="editorl" cols="80"
                                          rows="10"><?php echo $product['description']; ?></textarea>

                            </div>

                            <div class="form-group">
                                <label for="availability">Наличие на складе</label>
                                <select name="availability">
                                    <option value="1" <?php if ($product['availability'] == 1) echo 'selected="selected"'; ?>>
                                        Да
                                    </option>
                                    <option value="0" <?php if ($product['availability'] == 0) echo 'selected="selected"'; ?>>
                                        Нет
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="is_new">Новинка</label>
                                <select name="is_new">
                                    <option value="1" <?php if ($product['is_new'] == 1) echo 'selected="selected"'; ?>>
                                        Да
                                    </option>
                                    <option value="0" <?php if ($product['is_new'] == 1) echo 'selected="selected"'; ?>>
                                        Нет
                                    </option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="is_recommended">Рекомендуемые</label>
                                <select name="is_recommended">
                                    <option value="1" <?php if ($product['is_recommended'] == 1) echo 'selected="selected"'; ?>>
                                        Да
                                    </option>
                                    <option value="0" <?php if ($product['is_recommended'] == 0) echo 'selected="selected"'; ?>>
                                        Нет
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Статус</label>
                                <select name="status">
                                    <option value="1" <?php if ($product['status'] == 1) echo 'selected="selected"'; ?>>
                                        Отображается
                                    </option>
                                    <option value="0" <?php if ($product['status'] == 0) echo 'selected="selected"'; ?>>
                                        Скрыт
                                    </option>
                                </select>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button class="btn btn-default" type="submit">Сохранить</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>