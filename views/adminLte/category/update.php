<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<section class="content-header">
    <h1>Управление категориями</h1>
    <ol class="breadcrumb">
        <li><a href="/admin/"><i class="fa fa-dashboard"> Главная</i></a></li>
        <li class="active">Изменить категорию</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="name">Наименование категории</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           value="<?php echo $category['name']; ?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                                <div class="form-group">
                                    <label for="sort_order">Порядковый номер</label>
                                    <input type="text" name="sort_order" class="form-control" id="sort_order"
                                           value="<?php echo $category['sort_order']; ?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                                <div class="form-group">
                                    <label for="status">Статус</label>
                                    <select name="status">
                                        <option value="1" <?php if ($category['status'] == 1) echo 'selected="selected"' ?>>
                                            Отображается
                                        </option>
                                        <option value="0" <?php if ($category['status'] == 0) echo 'selected="selected"' ?>>
                                            Скрыта
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>

