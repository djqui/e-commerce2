<?php
class Product {
    private $id;
    private $name;
    private $price;
    private $description;

    public function __construct($id, $name, $price, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    // You can add a setPrice method if you want to change the price later
    public function setPrice($newPrice) {
        $this->price = $newPrice;
    }
}
?>