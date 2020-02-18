<?php


class AdminUserController extends AdminBase
{
    public function actionIndex(){
        self::checkAdmin();
        $usersList = User::getUserList();
        require_once (ROOT . '/views/adminLte/user/index.php');
        return true;
    }

    public function actionUpdate($id){
        self::checkAdmin();
        $user = User::getUserById($id);
        if ($_POST['submit']){
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['role'] = $_POST['role'];
            if ($options['role'] == 1){
                $options['role'] = 'admin';
            } else {
                $options['role'] = 'user';
            }


            User::updateById($id, $options);
            header('Location: /admin/user');
        }
        require_once (ROOT . '/views/adminLte/user/update.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['role'] = $_POST['role'];
            if ($options['role'] == 1) {
                $options['role'] = 'admin';
            } else {
                $options['role'] = 'user';
            }
        }
        $errors = false;

        if (!isset($options['name'])){
            $errors[] = 'Заполните поля';
        }
        if ($errors == false){
            User::register($options['name'],$options['email'],$options['role']);
            header('Location: /admin/user');
        }
        require_once (ROOT . '/views/adminLte/user/create.php');
        return true;
    }

    public function actionDelete($id){
        self::checkAdmin();
        User::deleteById($id);
        header('Location: /admin/user');
        return true;

    }

}