<?php include(ROOT . '/views/layouts/admin_header.php');?>
    <section class="content-header">
        <h1>Панель управления</h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard">  Главная</i></a></li>
            <li class="active"></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>Кол-во заказов:  <?php echo $countOrders;?></h4>
                        <p>New orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/admin/order/" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h4>Кол-во продуктов: <?php echo $countProducts;?></h4>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/admin/product/" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4>Кол-во юзеров: <?php echo $countUsers;?></h4>
                        <p>User registration</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/admin/user/" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h4>Кол-во Категорий: <?php echo $countCategories;?></h4>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="/admin/category/" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>

        </div>
        <div class="flex-fill" style="display: -webkit-flex;
-webkit-align-items: flex-start;">
            <?php include ROOT . '/views/adminLte/main/include/order.php';?>
            <?php include ROOT . '/views/adminLte/main/include/product.php';?>
        </div>

    </section>

<?php include ROOT . '/views/layouts/admin_footer.php';?>