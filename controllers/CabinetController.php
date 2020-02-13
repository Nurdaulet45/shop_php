<?php


class CabinetController
{

    public static function actionIndex(){
        $userId = User::checkLogged();
//        echo $userId;
        $user = User::getUserById($userId);
        require_once ROOT.'/views/cabinet/index.php';
        return true;
    }

    public static function actionEdit() {
        //Получаем  идентификатор из сесии
        $userId = User::checkLogged();

        //Получаем  информацию о пользователе из БД
        $user = User::getUserById($userId);
        $result = false;

        $name = $user['name'];
        $password = $user['password'];

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;
            if (!User::checkName($name)){
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)){
                $errors[] = 'Неправильный email';
                echo 'email';
            }

            if (!User::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if ($errors == false){
                $result = User::userEdit($userId, $name, $email, $password);
            }

        }

        require_once ROOT.'/views/cabinet/edit.php';
        return true;

    }
}