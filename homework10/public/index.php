<?php
require_once "../app/models/Model.php";
require_once "../app/models/Product.php";
require_once "../app/controllers/ProductController.php";

// Set environment variables from .env file
$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

// Use the ProductController class
use app\controllers\ProductController;

// Get URI without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

// Split URI into segments
$uriArray = explode("/", $uri);

// Routing logic
if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle API requests for products
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $productController = new ProductController();

    if ($id) {
        // Fetch and return a single product by ID
        $productController->getProductByID($id);
    } else {
        // Fetch and return all products or search results
        $productController->getProducts();
    }

} elseif ($uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle regular webpage requests for products
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $productController = new ProductController();

    if ($id) {
        // Show details for a specific product
        $productController->productDetailsView();
    } else {
        // Show the list of products
        $productController->productsView();
    }

} else {
    // If no matching route found, show a 404 page
    include '../public/assets/views/notFound.html';
    exit();
}
