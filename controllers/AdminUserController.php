<?php


class AdminUserController extends AdminBase
{
    public function actionIndex(){
        self::checkAdmin();
        $usersList = User::getUserList();
        require_once (ROOT . '/views/admin/user/index.php');
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
        require_once (ROOT . '/views/admin/user/update.php');
        return true;
    }

    public function actionDelete($id){
        self::checkAdmin();
        User::deleteById($id);
        header('Location: /admin/user');
        return true;

    }

}