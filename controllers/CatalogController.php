<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';

class CatalogController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts();
        require_once (ROOT . "/views/catalog/index.php");

        return true;
    }

    public function actionView(){
        echo 'actionView';
        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
//        echo 'category:' . "$categoryId";
//        echo '<br>Page: '.$page;
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/catalog/catalog.php');
        return true;


    }



}