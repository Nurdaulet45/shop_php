<?php include(ROOT . '/views/layouts/admin_header.php');?>
    <section class="content-header">
        <h1>Управление категориями</h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard">  Админ панель</i></a></li>
            <li><a href="/admin/order">Управление заказами</a></li>
            <li class="active">Список заказов</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>ID заказа</th>
                                <th>Имя покупателя</th>
                                <th>Телефон покупателя</th>
                                <th>Дата оформления</th>
                                <th>Статус</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php foreach ($ordersList as $order): ?>
                                <tr>
                                    <td>
                                        <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                            <?php echo $order['id']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $order['user_name']; ?></td>
                                    <td><?php echo $order['user_phone']; ?></td>
                                    <td><?php echo $order['date']; ?></td>
                                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                                    <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td><a class="delete" href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>