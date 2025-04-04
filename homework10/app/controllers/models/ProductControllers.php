<?php

namespace app\controllers;

use app\models\Product;

class ProductController
{
    public function getProducts() {
        $productModel = new Product();
        $query = !empty($_GET['name']) ? $_GET['name'] : null;
        $products = $productModel->getProducts($query);
        echo json_encode($products);
        exit();
    }

    public function getProductByID($id) {
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        echo json_encode($product);
        exit();
    }

    public function productsView() {
        include '../public/assets/views/product/products.html';
        exit();
    }

    public function productDetailsView() {
        include '../public/assets/views/product/productDetails.html';
        exit();
    }
}
