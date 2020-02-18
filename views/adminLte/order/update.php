<?php include(ROOT . '/views/layouts/admin_header.php'); ?>
    <section class="content-header">
        <h1>Редактировать заказ #<?php echo $id; ?></h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard"> Админ панель</i></a></li>
            <li><a href="/admin/order">Управление заказами</a></li>
            <li class="active">Редактировать заказ</li>
        </ol>
    </section>
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">

                            <form action="#" method="post">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Имя клиента</td>
                                        <td> <input type="text" name="userName" placeholder=""
                                                    value="<?php echo $order['user_name']; ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Телефон клиента</td>
                                        <td> <input type="text" name="userPhone" placeholder=""
                                                    value="<?php echo $order['user_phone']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Комментарий клиента</td>
                                        <td><input type="text" name="userComment" placeholder=""
                                                         value="<?php echo $order['user_comment']; ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Дата оформления заказа</td>
                                        <td><input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Статус</td>
                                        <td><select name="status">
                                                <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>
                                                    Новый заказ
                                                </option>
                                                <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>
                                                    В обработке
                                                </option>
                                                <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>
                                                    Доставляется
                                                </option>
                                                <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>
                                                    Закрыт
                                                </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <br>
                                    <div class="box-footer">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
                                    </div>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>