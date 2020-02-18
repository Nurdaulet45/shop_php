<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<section class="content-header">
    <h1>Управление категориями</h1>
    <ol class="breadcrumb">
        <li><a href="/admin/"><i class="fa fa-dashboard">  Главная</i></a></li>
        <li class="active">Управление категориями</li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div width="100%">
                        <small style="margin-left: 70px;">
                            Для Редактирования - нажмите на категорию
                        </small>
                        <small style="margin-left: 70px;">
                            Невозможно удалять категории имеющие наследника или имеющие товары.
                        </small>
                    </div>
                    <br>


                    <table class="table-bordered table-striped table">
                        <tr>
                            <td>ID категории</td>
                            <td>Название категории</td>
                            <td>Порядковый номер</td>
                            <td>Статус</td>
                            <td>Действие</td>
                        </tr>
                        <?php foreach ($categoriesList as $category):?>
                            <tr>
                                <td><?php echo $category['id']; ?></td>
                                <td><?php echo $category['name']; ?></td>
                                <td><?php echo $category['sort_order']; ?></td>
                                <td><?php echo $category['status']; ?></td>
                                <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                <td><a class="delete" href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                            </tr>
                        <?php endforeach;?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/admin_footer.php'; ?>

