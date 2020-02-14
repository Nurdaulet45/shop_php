<?php


class AdminCategoryController extends AdminBase
{

    public function actionIndex(){
        self::checkAdmin();
        $categoriesList = Category::getCategoriesListAdmin();
        require_once (ROOT . '/views/admin/category/index.php');
        return true;
    }

    public function actionCreate(){
        self::checkAdmin();
        $categoriesList = Category::getCategoriesListAdmin();

        if (isset($_POST['submit'])){
            $category['name'] = $_POST['name'];
            $category['sort_order'] = $_POST['sort_order'];
            $category['status'] = $_POST['status'];
        }
        $errors = false;

        if (!isset($category['name'])){
            $errors[] = 'Заполните поля';
        }
        if ($errors == false){
            Category::createCategory($category);

            header('Location: /admin/category');
        }
        require_once ROOT . '/views/admin/category/create.php';
        return true;
    }


    public function actionUpdate($id){
        self::checkAdmin();
        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];
            $id = Category::updateCategoryById($id, $options);

            header('Location: /admin/category');

        }

        require_once (ROOT . '/views/admin/category/update.php');
        return true;
    }


    public function actionDelete($id){
        self::checkAdmin();
        if (isset($_POST['submit'])){
            Category::deleteCategoryById($id);
            header('Location: /admin/category');
        }
        require_once (ROOT . '/views/admin/category/delete.php');
        return true;
    }

}