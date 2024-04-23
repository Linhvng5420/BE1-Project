<?php
class Product extends Db{
    //Viet phuong thuc lay ra tat ca san pham moi nhat
    function getAllProducts(){
        $sql = self::$connection->prepare("SELECT * 
        FROM products,manufactures,protypes 
        WHERE products.manu_id = manufactures.manu_id
        AND products.type_id = protypes.type_id
        ORDER BY id DESC
        LIMIT 0,10");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    
}