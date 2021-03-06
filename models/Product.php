<?php


class Product
{
    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT){
        $count = intval($count);
        $db = Db::getConnection();
        $productList = array();

        $result = $db->query('SELECT id,name,price,image,description,is_new FROM product WHERE status="1" ORDER BY id DESC LIMIT '. $count);

        $i=0;
        while ($row = $result->fetch()){
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productList;
    }

    public static function getRecommendedProducts(){
        $db = Db::getConnection();
        $result = $db->query("SELECT id, name, price, is_new FROM product WHERE status = '1' AND is_recomended = '1' ORDER BY id DESC");
        $productList = array();
        $i = 0;

        while ($row = $result->fetch()){
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productList;

    }

    public static function getProductList(){
        $db = Db::getConnection();
        $result = $db->query('SELECT id,name,price,code,description FROM product ORDER BY id ASC');
        $productList = array();
        $i = 0;
        while ($row = $result->fetch()){
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['code'] = $row['code'];
            $productList[$i]['description'] = $row['description'];
            $i++;
        }
        return $productList;
    }

    public static function getProductListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId){
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id,name,price,image,is_new FROM product " .
                "WHERE status = '1' AND category_id = '$categoryId' " .
                "ORDER BY id DESC ". "LIMIT ".self::SHOW_BY_DEFAULT .
                " OFFSET $offset");
            $i = 0;
            while ($row = $result->fetch()){
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }
            return $products;

        }

    }

    public static function getLatestProductsSite($page = 1){
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id,name,price,image,is_new FROM product " .
                "WHERE status = '1' " .
                "ORDER BY id DESC ". "LIMIT ".self::SHOW_BY_DEFAULT .
                " OFFSET $offset");
            $i = 0;
            while ($row = $result->fetch()){
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }
            return $products;


    }

    public static function getProductById($id){
        $id = intval($id);
        if ($id){
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getTotalProductsInCategory($categoryId){
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM product '
        . 'WHERE status="1" AND category_id="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getTotalProductSite(){
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getProductByIds($idsArray){

        $products = array();
        $db = Db::getConnection();
        $idsString = implode(',', $idsArray);
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()){
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;

    }



    public static function createProduct($options){
        $db = Db::getConnection();
        $sql = 'INSERT INTO product (name, code, price, category_id, brand, availability, description, is_new, is_recomended, status)' .
            'VALUES (:name, :code, :price, :category_id, :brand, :availability, :description, :is_new, :is_recomended, :status)';

        $result = $db->prepare($sql);

        $result->bindParam(':name',$options['name'], PDO::PARAM_STR);
        $result->bindParam(':code',$options['code'], PDO::PARAM_STR);
        $result->bindParam(':price',$options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id',$options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand',$options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability',$options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description',$options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new',$options['is_new'], PDO::PARAM_STR);
        $result->bindParam(':is_new',$options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recomended',$options['is_recomended'], PDO::PARAM_INT);
        $result->bindParam(':status',$options['status'], PDO::PARAM_INT);

        if ($result->execute()){
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateProductById($id, $options){
        $db = Db::getConnection();
        $sql = "UPDATE product 
                    SET
                     name = :name,code = :code,
                     price = :price, 
                     category_id = :category_id,
                     brand = :brand,
                     availability = :availability,
                     description = :description,
                     is_new = :is_new,
                     is_recomended = :is_recomended,
                     status = :status
                     WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id, PDO::PARAM_INT);
        $result->bindParam(':name',$options['name'], PDO::PARAM_STR);
        $result->bindParam(':code',$options['code'], PDO::PARAM_STR);
        $result->bindParam(':price',$options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id',$options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand',$options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability',$options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description',$options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new',$options['is_new'], PDO::PARAM_STR);
        $result->bindParam(':is_new',$options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recomended',$options['is_recomended'], PDO::PARAM_INT);
        $result->bindParam(':status',$options['status'], PDO::PARAM_INT);

        return $result->execute();


    }

    public static function deleteProductById($id){
        $db = Db::getConnection();
        $sql = "DELETE FROM product WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam("id",$id,PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getImage($imageName){
        $noImage = 'no-image.jpg';
        $path = '/upload/images/products/';
        $pathToProductImage = $path . $imageName;

        if (empty($imageName)){
            return $path . $noImage;
        }
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)){
            return $pathToProductImage;
        }

        return $path . $noImage;
    }


    public static function searchSite($searchKey){
        $db = Db::getConnection();
        $sql = "SELECT * FROM product WHERE description LIKE '%$searchKey%' LIMIT 10";
        $result = $db->prepare($sql);
        $result->bindValue(1, "%$searchKey%", PDO::PARAM_STR);
        $result->execute();

        $products = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['is_new'] = $row['is_new'];
            $i++;

        }
        return $products;
    }

}