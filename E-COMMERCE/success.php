<?php
session_start();
include 'includes/header.php';
?>

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/site-style.css">
<link rel="stylesheet" href="css/loginsignup-style.css">

<div class="container">
    <div class="panel">
        <h2>Payment Successful</h2>
        <?php
        if (isset($_SESSION['payment_amount'])) {
            echo "<p>Your payment of $" . number_format($_SESSION['payment_amount'], 2) . " has been processed successfully.</p>";
            
            // Clear the payment amount from the session
            unset($_SESSION['payment_amount']);
        } else {
            echo "<p>No payment information available.</p>";
        }
        ?>
        <form action="products.php">
            <input type="submit" value="Continue Shopping" class="button">
        </form>
    </div>
</div>

<?php
include 'includes/footer.php';
?>