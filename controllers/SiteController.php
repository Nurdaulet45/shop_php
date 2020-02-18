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

        if (isset($_POST['search'])) {
            $searchKey = trim($_POST['search']);
            $products = Product::searchSite($searchKey);
            return require_once ROOT . '/views/site/search.php';
        } elseif ($_POST['search'] = '') {
            return require_once ROOT . '/views/site/search_result.php';
        }
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

    public function actionSearch()
    {
        if (isset($_POST['search'])) {
            $searchKey = trim($_POST['search']);
            $products = Product::searchSite($searchKey);
        } else {
            echo "heredf </br>";
        }
         require_once ROOT . '/views/search/search.php';

        return true;
    }




}