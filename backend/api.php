<?php
require_once 'models/Cart.php';
require_once 'models/Item.php';

if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/', 
        'domain' => 'localhost',
        'secure' => false,
        'httponly' => true
    ]);
    session_start();
}

header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

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