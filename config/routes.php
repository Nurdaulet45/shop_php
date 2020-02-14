<?php

return array(
    'product/([0-9]+)' => 'product/view/$1', // ProductView в ProductController

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'catalog' => 'catalog/index',

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',// actionCategory to CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',//actionCategory to CatalogController

    'cart/checkout' => 'cart/checkout',
    'cart/add/([0-9]+)' => 'cart/add/$1', //actionAdd to CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1', //actionAdd to CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', //actionAdd to CartController
    'cart' => 'cart/index',

    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
    'admin/user' => 'adminUser/index',

    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',

    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',


    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    'admin' => 'admin/index',


    'user/login' => 'user/login', //actionRegister to UserController
    'user/logout' => 'user/logout', //actionRegister to UserController
    'user/register' => 'user/register', //actionRegister to UserController
    'page-([0-9]+)' => 'site/index/$1',// actionCategory to CatalogController
    '' => 'site/index',// SiteView в SiteController
);
