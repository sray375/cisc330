<?php
require_once "../app/models/Model.php";
require_once "../app/models/FrogProduct.php";
require_once "../app/controllers/FrogProductController.php";

// Loading environment variables for database connection
$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\FrogProductController;

// Extract URI without query parameters
$uri = strtok($_SERVER["REQUEST_URI"], '?');

// Breaking down URI
$uriArray = explode("/", $uri);

// Handling different API routes for frog products
if ($uriArray[1] === 'api' && $uriArray[2] === 'frog-products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $frogProductController = new FrogProductController();

    if ($id) {
        $frogProductController->getFrogProductByID($id);
    } else {
        $frogProductController->getAllFrogProducts();
    }
}

// Saving a new frog product
if ($uriArray[1] === 'api' && $uriArray[2] === 'frog-products' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $frogProductController = new FrogProductController();
    $frogProductController->saveFrogProduct();
}

// Updating a frog product
if ($uriArray[1] === 'api' && $uriArray[2] === 'frog-products' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $frogProductController = new FrogProductController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $frogProductController->updateFrogProduct($id);
}

// Deleting a frog product
if ($uriArray[1] === 'api' && $uriArray[2] === 'frog-products' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $frogProductController = new FrogProductController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $frogProductController->deleteFrogProduct($id);
}

// Views for displaying frog products
if ($uriArray[1] === 'frog-products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $frogProductController = new FrogProductController();

    if ($id) {
        $frogProductController->frogProductDetailsView();
    } else {
        $frogProductController->frogProductsView();
    }
}

// View for adding a new frog product
if ($uri === '/new-frog-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $frogProductController = new FrogProductController();
    $frogProductController->frogProductAddView();
}

// View for updating a frog product
if ($uriArray[1] === 'update-frog-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $frogProductController = new FrogProductController();
    $frogProductController->frogProductUpdateView();
}

// View for deleting a frog product
if ($uriArray[1] === 'delete-frog-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $frogProductController = new FrogProductController();
    $frogProductController->frogProductDeleteView();
}

// Catch-all handler for unknown routes
include '../public/assets/views/frogNotFound.html';
exit();
?>

