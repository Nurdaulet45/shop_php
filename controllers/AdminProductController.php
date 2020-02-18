<?php


class AdminProductController extends AdminBase
{
    public function actionIndex(){
        self::checkAdmin();
        $productList = Product::getProductList();

        require_once (ROOT . '/views/adminLte/product/index.php');
        return true;
    }

    public function actionDelete($id){
        self::checkAdmin();
            Product::deleteProductById($id);
            header("Location: /admin/product");
        require_once (ROOT . "/views/adminLte/product/delete.php");
        return true;
    }

    public function actionCreate(){
        self::checkAdmin();
        $categoryList = Category::getCategoriesListAdmin();

        if (isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;
            if (!isset($options['name'])){
                $errors[] = 'Заполните поля';
            }

            if ($errors == false){
                // Добавлен новый товар
                $id = Product::createProduct($options);

                // Если запись добавлен
                if ($id){
                    if (is_uploaded_file($_FILES['image']['tmp_name'])){
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "upload/images/products/{$id}.jpg");
                    }
                }
                header("Location: '/admin/product'");
            }
        }
        require_once (ROOT . '/views/adminLte/product/create.php');
        return true;
    }


    public function actionUpdate($id){
        self::checkAdmin();
        $categoryList = Category::getCategoriesListAdmin();

        $product = Product::getProductById($id);

        if (isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];


            if (Product::updateProductById($id, $options)) {

                // Если запись добавлен
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "upload/images/products/{$id}.jpg");
                }
            }
            header("Location: '/admin/product'");

        }
        require_once (ROOT . '/views/adminLte/product/update.php');
        return true;
    }

}