<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\DatabaseConnection;

class FrogProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new Product(new DatabaseConnection());
    }

    // Show all products - fetches the list of products from the database
    public function showAllProducts()
    {
        $products = $this->productModel->fetchAllProducts();
        include '../views/frog_product_listing.php'; // View to display the products
    }

    // View a single product based on ID
    public function showSingleProduct($id)
    {
        $product = $this->productModel->fetchProductById($id);
        include '../views/frog_product_details.php'; // View for displaying a single product
    }

    // Add a new product to the database
    public function addNewProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            
            if ($this->productModel->insertNewProduct($name, $description)) {
                header("Location: /products"); // Redirect after adding a product
                exit();
            } else {
                echo "There was an error adding the product.";
            }
        } else {
            include '../views/frog_add_product.php'; // Display form for adding a new product
        }
    }

    // Update an existing product
    public function editProduct($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            
            if ($this->productModel->updateProductById($id, $name, $description)) {
                header("Location: /products");
                exit();
            } else {
                echo "There was an error updating the product.";
            }
        } else {
            $product = $this->productModel->fetchProductById($id);
            include '../views/frog_update_product.php'; // View for editing a product
        }
    }

    // Delete a product from the database
    public function deleteProduct($id)
    {
        if ($this->productModel->removeProductById($id)) {
            header("Location: /products");
            exit();
        } else {
            echo "There was an error deleting the product.";
        }
    }

    // Search products based on the query string (e.g., name)
    public function searchProducts()
    {
        $searchTerm = isset($_GET['name']) ? $_GET['name'] : null;
        $products = $this->productModel->searchProductsByName($searchTerm);
        include '../views/frog_product_listing.php'; // Display products that match the search
    }
}

