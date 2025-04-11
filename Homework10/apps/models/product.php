<?php

namespace App\Models;

class Product
{
    protected $db;

    // Constructor accepts a DatabaseConnection instance and initializes the PDO connection
    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db->getConnection(); // Using the DatabaseConnection class
    }

    // Fetch all products from the 'frog_products' table
    public function fetchAllProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM frog_products"); // Updated table name
        $stmt->execute();
        return $stmt->fetchAll(); // Fetch all products and return as an associative array
    }

    // Fetch a single product by its ID
    public function fetchProductById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM frog_products WHERE id = :id"); // Table name updated
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(); // Return a single product
    }

    // Insert a new product into the database
    public function insertNewProduct($name, $description)
    {
        $stmt = $this->db->prepare("INSERT INTO frog_products (name, description) VALUES (:name, :description)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        return $stmt->execute(); // Execute and return if successful
    }

    // Update an existing product by its ID
    public function updateProductById($id, $name, $description)
    {
        $stmt = $this->db->prepare("UPDATE frog_products SET name = :name, description = :description WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        return $stmt->execute(); // Execute and return if successful
    }

    // Remove a product by its ID
    public function removeProductById($id)
    {
        $stmt = $this->db->prepare("DELETE FROM frog_products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); // Execute and return if successful
    }

    // Search products by name (for searching by keyword)
    public function searchProductsByName($name)
    {
        $stmt = $this->db->prepare("SELECT * FROM frog_products WHERE name LIKE :name");
        $stmt->bindValue(':name', "%$name%");
        $stmt->execute();
        return $stmt->fetchAll(); // Return matching products
    }
}

