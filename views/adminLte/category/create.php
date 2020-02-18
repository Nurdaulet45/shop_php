<?php include(ROOT . '/views/layouts/admin_header.php');?>
<section class="content-header">
    <h1>Добавить категорию</h1>
    <ol class="breadcrumb">
        <li><a href="/admin/"><i class="fa fa-dashboard">  Админ панель</i></a></li>
        <li><a href="/admin/category">Управление категориями</a></li>
        <li class="active">Добавить категорию</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
            <br/>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

                <form action="#" method="post"
                      data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="name">Наименование категории</label>
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="Наименование категории" required value="">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="status">Статус</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="0">-- Самостоятельная категория -- </option>
                                <option value="1" name="status" selected="selected">Отображается</option>
                                <option value="0">Скрыта</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sort_order">Порядковый номер</label>
                            <input type="text" name="sort_order" placeholder="" value="">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>


        </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>

