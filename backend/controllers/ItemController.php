<?php
require_once 'models/Item.php';

class ItemController {
    public function getAllItems($db) {
        $items = Item::getAllItems($db);
        header('Content-Type: application/json');
        echo json_encode($items);
    }
}
?>