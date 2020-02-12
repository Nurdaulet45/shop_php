<?php

return array(
    'product/([0-9]+)' => 'product/view/$1', // ProductView в ProductController
    'cabinet' => 'cabinet/index',
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',// actionCategory to CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',//actionCategory to CatalogController
    'user/login' => 'user/login', //actionRegister to UserController
    'user/logout' => 'user/logout', //actionRegister to UserController
    'user/register' => 'user/register', //actionRegister to UserController
    '' => 'site/index',// SiteView в SiteController
);
