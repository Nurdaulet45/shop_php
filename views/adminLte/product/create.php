<?php include(ROOT . '/views/layouts/admin_header.php');?>
<section class="content-header">
    <h1>Управление категориями</h1>
    <ol class="breadcrumb">
        <li><a href="/admin/"><i class="fa fa-dashboard">  Админ панель</i></a></li>
        <li><a href="/admin/product">Управление товарами</a></li>
        <li class="active">Редактировать товар</li>
    </ol>
</section>


<section class="content">
    <div class="row">

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="box">
                <form action="#" enctype="multipart/form-data"
                      method="post" data-toggle="validator" id="add">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Наименование товара</label>
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="Наименование товара" value="" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="keywords">Артикул</label>
                            <input type="text" name="code" class="form-control" id="code"
                                   placeholder="Ключевые слова" value="" required>
                        </div>
                        <div class="form-group">
                                <select name="category_id">
                                    <option>-- Выберите категорию --</option>

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
                            <label for="description">Описание</label>
                            <input type="text" name="description" class="form-control" id="description"
                                   placeholder="Описание" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input type="text" name="price" class="form-control" id="price"
                                   placeholder="Цена" pattern="^[0-9.]{1,}$" value=""
                                   required data-error="Допускаются цифры и десятичная точка">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label for="brand">Производитель</label>
                            <input type="text" name="brand" class="form-control"
                                   value="">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="image">Изображение товара</label>
                            <input type="file" name="image" placeholder="" value="">
                        </div>

                        <div class="form-group">
                            <label for="status">Статус
                            </label>
                            <select name="status">
                                <option value="1" selected="selected">Отображается</option>
                                <option value="0">Скрыт</option>
                            </select>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button class="btn btn-success"  name="submit" type="submit">Добавить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>


