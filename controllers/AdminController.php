<?php


class AdminController extends AdminBase
{
    public function actionIndex(){
        self::checkAdmin();
        $lastOrders = Order::getOrdersList();
        $lastProduct = Product::getProductList();
        $countCategories = count(Category::getCategoriesListAdmin());
        $countOrders = count(Order::getOrdersList());
        $countProducts = count(Product::getProductList());
        $countUsers = count(User::getUserList());

        require_once(ROOT . '/views/adminLte/main/index.php');
        return true;
    }

}