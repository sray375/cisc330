<?php

namespace app\models;

class Product extends Model {

    protected $table = 'products';

    public function getProducts($name) {
        if ($name) {
            $query = "SELECT * FROM products WHERE name LIKE :name";
            return $this->fetchAllWithParams($query, ['name' => "%" . $name . "%"]);
        }
        $query = "SELECT * FROM products";
        return $this->fetchAll($query);
    }

    public function getProductById($id){
        $query = "SELECT * FROM products WHERE id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}
