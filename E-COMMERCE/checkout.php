<?php
session_start();
include 'includes/header.php';
include 'classes/Payment.php';
?>

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/site-style.css">
<link rel="stylesheet" href="css/loginsignup-style.css">

<div class="container">
    <div class="panel">
        <h2>Checkout</h2>
        <?php
        if (empty($_SESSION['cart'])) {
            echo "<p>Your cart is empty. Nothing to checkout.</p>";
        } else {
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                echo "<p>{$item['name']} - $" . number_format($item['price'], 2) . "</p>";
                $total += $item['price'];
            }
            echo "<p><strong>Total: $" . number_format($total, 2) . "</strong></p>";

            if (isset($_POST['pay'])) {
                $payment = new Payment();
                $payment->processPayment($total);
                
                $_SESSION['payment_amount'] = $total;
                $_SESSION['cart'] = [];
                
                header("Location: success.php");
                exit();
            } else {
                echo "<form method='post'>";
                echo "<input type='submit' name='pay' value='Pay Now' class='button'>";
                echo "</form>";
            }
        }
        ?>
        <form action="cart.php">
            <input type="submit" value="Back to Cart" class="button">
        </form>
    </div>
</div>

<?php
include 'includes/footer.php';
?>