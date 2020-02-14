<?php


class AdminOrderController extends AdminBase
{
    public function actionIndex(){
        $ordersList = Order::getOrdersList();
        require_once (ROOT . '/views/admin/order/index.php');
        return true;
    }

    public function actionView($id){
        self::checkAdmin();
        $order = Order::getOrderById($id);
        $productsQuantity = json_decode($order['products'], true);
        $productsIds = array_keys($productsQuantity);
        $products = Product::getProductByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        require_once (ROOT . '/views/admin/order/view.php');
        return true;
    }

    public function actionUpdate($id){
        self::checkAdmin();
        $order = Order::getOrderById($id);
        if (isset($_POST['submit'])){
            $options['user_name'] = $_POST['userName'];
            $options['user_phone'] = $_POST['userPhone'];
            $options['user_comment'] = $_POST['userComment'];
            $options['date'] = $_POST['date'];
            $options['status'] = $_POST['status'];

            Order::updateOrderById($id, $options);
            header('Location: /admin/order');
        }
        require_once (ROOT . '/views/admin/order/update.php');
        return true;
    }

    public function actionDelete($id){
        self::checkAdmin();
        if (isset($_POST['submit'])){
            Order::deleteOrderById($id);
            header('Location: /admin/order');

        }
        require_once (ROOT . '/views/admin/order/delete.php');
        return true;
    }




}