<?php
require_once 'models/Cart.php';

class CartController {
    public function addToCart($db) {
        $data = json_decode(file_get_contents('php://input'), true);
        $itemSku = $data['sku'];
    
        $query = 'SELECT * FROM items WHERE sku = :sku';
        $statement = $db->prepare($query);
        $statement->bindValue(':sku', $itemSku);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            $item = new Item($result['sku'], $result['name'], $result['price']);
    
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = new Cart();
            }
    
            $_SESSION['cart']->addItem($item);
            $response = ['status' => 'success'];
        } else {
            $response = ['status' => 'error', 'message' => 'Item not found'];
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function getCart() {
        if (!isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof Cart)) {
            $_SESSION['cart'] = new Cart();
        }
    
        $cart = $_SESSION['cart'];
        $items = $cart->getItems();
        $total = $cart->getTotal();
    
        $response = [
            'items' => $items,
            'total' => $total
        ];
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>