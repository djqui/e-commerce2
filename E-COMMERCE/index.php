<?php
session_start();
include 'includes/header.php';
?>

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/site-style.css">
<link rel="stylesheet" href="css/loginsignup-style.css">

<div class="box">
    <?php if (isset($_SESSION['user'])): ?>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
    <?php else: ?>
        <h2>Welcome, user</h2>
    <?php endif; ?>
    <div class="about">
        <h2> About Kwangya Shop </h2>
        <p> Welcome to Kwangya Shop, your ultimate destination for all things SM Entertainment!</p>
        <h3> What We Offer </h3>
        <p> At Kwangya Shop, we pride ourselves on providing an extensive collection of official SM Entertainment merchandise: </p>
        <ul>
            <li> Exclusive merchandise from your favorite K-pop groups </li>
            <li> Limited edition items that you won't find anywhere else </li>
            <li> A wide range of products to suit every fans taste and budget </li>
        </ul>
        <p> For customer support or inquiries, please contact us at support@kwangyashop.com or call +1 (XXX) XXX-XXXX. </p>
    </div>
</div>

<?php
include 'includes/footer.php';
?>