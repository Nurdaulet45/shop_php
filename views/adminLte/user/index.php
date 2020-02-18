<?php include(ROOT . '/views/layouts/admin_header.php');?>
    <section class="content-header">
        <h1>Управление категориями</h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard">  Админ панель</i></a></li>
            <li class="active">Управление пользователями</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <br/>
                        <h4>Список пользователей</h4>
                        <br/>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>ID пользователя</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Роль</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php foreach ($usersList as $user): ?>
                                <tr>
                                    <td>
                                        <a href="/admin/order/view/<?php echo $user['id']; ?>">
                                            <?php echo $user['id']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $user['name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['role']; ?></td>
                                    <td><a href="/admin/user/view/<?php echo $user['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="/admin/user/update/<?php echo $user['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td><a class="delete" href="/admin/user/delete/<?php echo $user['id']; ?>" title="Удалить"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>