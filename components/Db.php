<?php


class Db
{

    public static function getConnection(){
      $params = ROOT.'/config/db_params.php';
      $params = include($params);
      $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
      $db = new PDO($dsn, $params['user'],$params['password'],[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      $db->exec("set names utf8");
      return $db;
    }

}