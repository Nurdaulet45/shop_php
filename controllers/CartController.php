<?php


class CartController
{
    public function actionadd($id){
        Cart::addProduct($id);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionAddAjax($id){
        echo Cart::addProduct($id);
        return true;
    }


    public function actionIndex(){
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();
        var_dump($productsInCart);

        if (isset($productsInCart)){
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once ROOT.'/views/cart/index.php';
        return true;

    }

    public function actionCheckout(){

        $categories = array();
        $categories = Category::getCategoriesList();

        $result = false;

        if ($_POST['submit']){
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            // Валидация полей
            $errors = false;
            if (!User::checkName($userName)){
                $errors[] = 'Неправильное имя Неправильное телефон';
            }
            if (!User::checkPhone($userPhone)){
                $errors[] = 'Неправильное телефон';
            }

            if ($errors == false){
                $productInCart = Cart::getProducts();

                if (User::isGuest()){
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }

                $result = Order::save($userName, $userPhone, $userComment, $userId, $productInCart);

                if ($result){
                    $adminEmail = 'a@a.ru';
                    $message = 'https://shop/admin/orders';
                    $subject = 'Новый заказ';
                    mail($adminEmail, $message, $subject);
                    Cart::clear();
                }
            } else {
                $productInCart = Cart::getProducts();
                $productIds = array_keys($productInCart);
                $products = Product::getProductById($productIds);
                $totalPrice = Cart::getTotalPrice($productIds);
                $totalQuantity = Cart::countItems();


            }



        } else {
            //Получим данние из корзины
            $productInCart = Cart::getProducts();

            if ($productInCart == false){
                return header("Location: /");
            } else {
                // Итоги: Общая стоимость и количества товара
                $productIds = array_keys($productInCart);
                $products = Product::getProductById($productIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;
                // пользователь авторизован?
                if (User::isGuest()){
//
                } else {
                    $userId = User::checkLogged();
                    // Получаем инф о пользователе из БД по id
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                }
            }

        }
        require_once ROOT.'/views/cart/checkout.php';
        return true;
    }

}