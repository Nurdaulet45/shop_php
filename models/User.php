<?php


class User
{
    public static function register($name, $email, $password){

        $db = Db::getConnection();
        $sql = 'INSERT INTO user (name, email, password) VALUES (:name,:email,:password)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name,PDO::PARAM_STR);
        $result->bindParam(':email', $email,PDO::PARAM_STR);
        $result->bindParam(':password', $password,PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name){
        if (strlen($name) >= 2){
            return true;
        }
        return false;
    }

    public static function checkPassword($password){
        if (strlen($password) >= 6){
            return true;
        }
        return false;
    }

    public static function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    public static function checkPhone($userPhone){
        if (strlen($userPhone) >= 7){
            return true;
        }
    }

    public static function checkEmailExists($email){
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()){
            return true;
        }
        return false;

    }

    public static function checkUserData($email,$password){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email,PDO::PARAM_STR);
        $result->bindParam(':password', $password,PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user){
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged(){
        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    public static function isGuest(){
        if (isset($_SESSION['user'])){
            return true;
        }
        return false;
    }

    public static function getUserById($id){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id,PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function userEdit($id, $name, $email, $password){
        $db = Db::getConnection();
        $sql = 'UPDATE user SET name = :name, email = :email, password = :password WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getUserList(){
        $db = Db::getConnection();
        $sql = 'SELECT id,name,email,role FROM user ORDER BY id ASC';

        $result = $db->query($sql);
        $usersList = array();
        $i = 0;
        while ($row = $result->fetch()){
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['name'] = $row['name'];
            $usersList[$i]['email'] = $row['email'];
            $usersList[$i]['role'] = $row['role'];
            $i++;
        }

        return $usersList;
    }

    public static function updateById($id, $options){
        $db = Db::getConnection();
        $sql = 'UPDATE user SET name = :name, email = :email, role = :role WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam('id', $id, PDO::PARAM_STR);
        $result->bindParam('name', $options['name'], PDO::PARAM_STR);
        $result->bindParam('email', $options['email'], PDO::PARAM_STR);
        $result->bindParam('role', $options['role'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function deleteById($id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam('id', $id,PDO::PARAM_INT);
        return $result->execute();
    }

}