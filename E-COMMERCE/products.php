<?php
include 'includes/header.php';
include 'classes/Product.php';
?>

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/site-style.css">
<link rel="stylesheet" href="css/loginsignup-style.css">

<div class="product-panel">
    <?php
    $products = [
        new Product(1, "The 1st Album 'Armageddon' (Zine Ver.)", 1000, "aespa"),
        new Product(2, "The 4th Mini Album 'Drama' (Giant Ver.)", 1500, "aespa"),
        new Product(3, "Official Fanlight", 2100, "aespa")
    ];

    foreach ($products as $product) {
        echo "<div class='product'>";
        echo "<h3>" . $product->getName() . "</h3>";
        echo "<p>Price: $" . number_format($product->getPrice(), 2) . "</p>";
        echo "<p>" . $product->getDescription() . "</p>";
        echo "<form action='cart.php' method='get'>";
        echo "<input type='hidden' name='add' value='" . $product->getId() . "'>";
        echo "<input type='submit' value='Add to Cart' class='button add-to-cart'>";
        echo "</form>";
        echo "</div>";
    }
    ?>
</div>

<?php
include 'includes/footer.php';
?>