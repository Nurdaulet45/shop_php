<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';

class CatalogController
{
    public function actionIndex($page = 1)
    {
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts();
        if (isset($_POST['search'])) {
            $searchKey = trim($_POST['search']);
            $products = Product::searchSite($searchKey);
            return require_once ROOT . '/views/site/search.php';
        } elseif ($_POST['search'] = '') {
            return require_once ROOT . '/views/site/search_result.php';

        }
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