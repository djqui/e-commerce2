<?php
session_start();
include 'includes/header.php';
include 'classes/Product.php';
?>

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/site-style.css">
<link rel="stylesheet" href="css/loginsignup-style.css">

<div class="container">
    <div class="panel">
        <h2>Your Cart</h2>
        <?php
        // Initialize cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add to cart
        if (isset($_GET['add'])) {
            $productId = $_GET['add'];
            $products = [
                new Product(1, "The 1st Album 'Armageddon' (Zine Ver.)", 1000, "aespa"),
                new Product(2, "The 4th Mini Album 'Drama' (Giant Ver.)", 1500, "aespa"),
                new Product(3, "Official Fanlight", 2100, "aespa")
            ];
            
            $selectedProduct = array_filter($products, function($p) use ($productId) {
                return $p->getId() == $productId;
            });

            if (!empty($selectedProduct)) {
                $selectedProduct = reset($selectedProduct);
                $_SESSION['cart'][] = [
                    'id' => $selectedProduct->getId(),
                    'name' => $selectedProduct->getName(),
                    'price' => $selectedProduct->getPrice(),
                    'description' => $selectedProduct->getDescription()
                ];
            }
        }

        // Clear cart
        if (isset($_GET['clear'])) {
            $_SESSION['cart'] = [];
        }

        // Display cart
        if (empty($_SESSION['cart'])) {
            echo "<p>Your cart is empty.</p>";
        } else {
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                echo "<p>{$item['name']} - $" . number_format($item['price'], 2) . "</p>";
                $total += $item['price'];
            }
            echo "<p><strong>Total: $" . number_format($total, 2) . "</strong></p>";
            
            // Add checkout button
            echo "<form action='checkout.php' method='get'>";
            echo "<input type='submit' value='Proceed to Checkout' class='button'>";
            echo "</form>";
        }

        // Clear Cart button
        echo "<form action='cart.php' method='get'>";
        echo "<input type='hidden' name='clear' value='true'>";
        echo "<input type='submit' value='Clear Cart' class='button'>";
        echo "</form>";
        ?>
    </div>
</div>

<?php
include 'includes/footer.php';
?>