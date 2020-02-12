<?php


class CabinetController
{

    public static function actionIndex(){
        $userId = User::checkLogged();
        echo $userId;
        require_once ROOT.'/views/cabinet/index.php';
        return true;
    }
}