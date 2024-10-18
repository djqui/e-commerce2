<?php
session_start();
include 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User($username, $email, $password);
    if ($user->saveUser()) {
        $_SESSION['message'] = "Account created successfully. Please log in.";
        header("Location: login.php");
        exit();
    } else {
        $error = "Error creating account.";
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
    <title>Signup</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <div class="panel">
            <h1>Sign up</h1>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form class="form" method="POST" action="">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Create a Password" required>
                <button type="submit" class="button">Create account</button>
            </form>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>