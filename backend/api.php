<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once 'db.php';
require_once 'controllers/ItemController.php';
require_once 'controllers/CartController.php';

$itemController = new ItemController();
$cartController = new CartController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = '/kilkimi/backend/api.php';

if ($uri == $base_path . '/items') {
    $itemController->getAllItems($db);
} elseif ($uri == $base_path . '/cart/add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartController->addToCart($db);
} elseif ($uri == $base_path . '/cart') {
    $cartController->getCart();
} else {
    header('HTTP/1.1 404 Not Found');
}
?>