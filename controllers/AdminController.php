<?php


class AdminController extends AdminBase
{
    public function actionIndex(){
        self::checkAdmin();
        $lastOrders = Order::getOrdersList();
        $lastProduct = Product::getProductList();

        require_once(ROOT . '/views/adminLte/main/index.php');
        return true;
    }

}