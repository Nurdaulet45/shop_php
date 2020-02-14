<?php


class Order
{
    public static function save($userName, $userPhone, $userComment, $userId, $products){
        $db = Db::getConnection();
        $sql = "INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)";

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getOrdersList(){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM product_order ORDER BY id ASC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()){
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['user_comment'] = $row['user_comment'];
            $ordersList[$i]['user_id'] = $row['user_id'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    public static function getOrderById($id){
        $id = intval($id);
        if ($id){
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM product_order WHERE id =' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function updateOrderById($id, $options){
        $db = Db::getConnection();
        $sql = 'UPDATE product_order SET user_name = :name, user_phone = :phone, user_comment = :comment, date = :date, status = :status WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam('id', $id, PDO::PARAM_INT);
        $result->bindParam('name', $options['user_name'], PDO::PARAM_STR);
        $result->bindParam('phone', $options['user_phone'], PDO::PARAM_INT);
        $result->bindParam('comment', $options['user_comment'], PDO::PARAM_STR);
        $result->bindParam('date', $options['date'], PDO::PARAM_STR);
        $result->bindParam('status', $options['status'], PDO::PARAM_INT);

        return $result->execute();

    }

    public static function deleteOrderById($id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM product_order WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam('id', $id, PDO::PARAM_INT);
        return $result->execute();

    }

    public static function getStatusText($status){
        switch ($status){
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'Одобрен';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыть';
                break;
        }
    }


}