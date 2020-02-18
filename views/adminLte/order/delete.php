<?php include(ROOT . '/views/layouts/admin_header.php');?>
    <section class="content-header">
        <h1>Управление категориями</h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard">  Админ панель</i></a></li>
            <li><a href="/admin/order">Управление категориями</a></li>
            <li class="active">Удалить Заказ</li>
        </ol>
    </section>

    <section>
        <div class="container">
            <div class="row ">
                <br>

                <h4>Удалить Заказ №<?php echo $id;?></h4>
                <p>Вы действително хотите уд Заказ</p>
                <form method="post">
                    <input type="submit" name="submit" value="Удалить"/>
                </form>

            </div>
        </div>
    </section>



<?php include ROOT . '/views/layouts/admin_footer.php'; ?>