<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{
    public function actionIndex()
    {
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $productList = Product::getLatestProducts(3);
        require_once (ROOT . "/views/site/index.php");

        return true;
    }

    public function actionView(){
        echo 'actionView';
        return true;
    }


}