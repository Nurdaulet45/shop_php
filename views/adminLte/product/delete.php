<?php include(ROOT . '/views/layouts/admin_header.php');?>
    <section class="content-header">
        <h1>Управление категориями</h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard">  Админ панель</i></a></li>
            <li><a href="/admin/product">Управление товарами</a></li>
            <li class="active">Удалить товар товарами</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <br>
                    <div class="box-body">

                    <h4>Удалить товар №<?php echo $id;?></h4>
                    <p>Вы действително хотите уд товар</p>
                    <form method="post">
                        <input type="submit" name="submit" value="Удалить"/>
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </section>



<?php include ROOT . '/views/layouts/admin_footer.php'; ?>