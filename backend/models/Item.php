<?php
class Item {
    public $sku;
    public $name;
    public $price;

    public function __construct($sku, $name, $price) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public static function getAllItems($db) {
        $query = 'SELECT * FROM items';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $items = [];
        foreach ($results as $row) {
            $items[] = new Item($row['sku'], $row['name'], $row['price']);
        }
        return $items;
    }
}
?>