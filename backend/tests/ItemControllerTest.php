<?php
use PHPUnit\Framework\TestCase;

class ItemControllerTest extends TestCase {
    protected $db;

    protected function setUp(): void {
        $dsn = 'mysql:host=localhost;dbname=kilkimi_whiskies';
        $username = 'root';
        $password = 'root';
        $this->db = new PDO($dsn, $username, $password);
    }

    public function testGetAllItems() {
        $itemController = new ItemController();
        $items = $itemController->getAllItems($this->db);
        $this->assertIsArray($items);
    }
}
?>