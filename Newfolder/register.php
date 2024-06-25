<?php
session_start();
require 'functions.php';

$register_error = '';
$register_success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        $register_error = 'Passwords do not match.';
    } else {
        if (registerUser($username, $password)) {
            $register_success = 'User registered successfully. You can now <a href="login.php">login</a>.';
        } else {
            $register_error = 'Username already exists.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
</head>
<body>
<div class="container mt-3">
    <h1>Register</h1>
    <?php if ($register_error): ?>
        <div class="alert alert-danger"><?php echo $register_error; ?></div>
    <?php endif; ?>
    <?php if ($register_success): ?>
        <div class="alert alert-success"><?php echo $register_success; ?></div>
    <?php endif; ?>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
</body>
</html>
