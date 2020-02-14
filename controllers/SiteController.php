<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{
    public function actionIndex($page = 1)
    {
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $productList = Product::getLatestProductsSite($page);

        $total = Product::getTotalProductSite($page);
        $paginationSite = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        $sliderProducts = Product::getRecommendedProducts();
        require_once (ROOT . "/views/site/index.php");

        return true;
    }

    public function actionView(){
        echo 'actionView';
        return true;
    }




}