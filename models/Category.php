<?php

include_once ROOT.'/components/Db.php';
class Category
{
    public static function getCategoriesList(){
        $db= Db::getConnection();
        $categoryList = array();
        $result = $db->query("SELECT id,name FROM category ORDER BY sort_order ASC");
        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;

        }
        return $categoryList;
    }

    public static function getCategoriesListAdmin(){
        $db = Db::getConnection();
        $sql = 'SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC';
        $result = $db->query($sql);

        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }


    public static function createCategory($category){
        $db = Db::getConnection();
        $sql = "INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)";
        $result = $db->prepare($sql);
        $result->bindParam('name', $category['name'], PDO::PARAM_STR);
        $result->bindParam('sort_order', $category['sort_order'], PDO::PARAM_STR);
        $result->bindParam('status', $category['status'], PDO::PARAM_STR);
        if ($result->execute()){
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function getCategoryById($id){
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM category WHERE id = ' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    public static function updateCategoryById($id, $options){
        $db = Db::getConnection();
        $sql = 'UPDATE category SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam('id', $id, PDO::PARAM_INT);
        $result->bindParam('name', $options['name'], PDO::PARAM_STR);
        $result->bindParam('sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam('status', $options['status'], PDO::PARAM_INT);


        return $result->execute();
    }

    public static function deleteCategoryById($id){
        $db = Db::getConnection();

        $sql = 'DELETE FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam('id',$id,PDO::PARAM_INT);
        return $result->execute();

    }




}