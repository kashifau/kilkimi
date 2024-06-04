<?php
use PHPUnit\Framework\TestCase;

class CartControllerTest extends TestCase {
    protected $db;

    protected function setUp(): void {
        $dsn = 'mysql:host=localhost;dbname=kilkimi_whiskies';
        $username = 'root';
        $password = '';
        $this->db = new PDO($dsn, $username, $password);
    }

    public function testAddToCart() {
        $_POST = json_encode(['sku' => 'DEAN']);
        $cartController = new CartController();
        $response = $cartController->addToCart($this->db);
        $this->assertStringContainsString('success', $response);
    }

    public function testGetCart() {
        $cartController = new CartController();
        $response = $cartController->getCart();
        $this->assertIsArray(json_decode($response, true));
    }
}
?>