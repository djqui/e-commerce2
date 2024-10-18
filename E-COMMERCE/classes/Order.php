<?php
class Order {
    private $products = []; // Change to private for better encapsulation

    public function addToCart(Product $product) {
        array_push($this->products, $product); // Ensure only Product objects are added
    }

    public function displayCart() {
        if (empty($this->products)) {
            echo "<p>Your cart is empty.</p>";
            return;
        }

        echo "<h3>Items in your cart:</h3>";
        foreach ($this->products as $product) {
            echo "<p>{$product->getName()} - \${$product->getPrice()}</p>";
        }
    }
    
    public function getProducts() {
        return $this->products; // Getter method to access products if needed
    }
}
?>