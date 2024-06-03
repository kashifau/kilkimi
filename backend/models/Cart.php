<?php
class Cart {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }
}
?>