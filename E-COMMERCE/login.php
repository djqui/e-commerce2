<?php
session_start();
include 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $username = User::validateUser($email, $password);
    if ($username) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/site-style.css">
    <link rel="stylesheet" href="css/loginsignup-style.css">
    <title>Login</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <div class="panel">
            <h1>Login</h1>
            <?php 
            if (isset($_SESSION['message'])) {
                echo "<p class='message'>" . $_SESSION['message'] . "</p>";
                unset($_SESSION['message']);
            }
            if (isset($error)) echo "<p class='error'>$error</p>"; 
            ?>
            <form class="form" method="POST" action="">
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="button">Login</button>
            </form>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>