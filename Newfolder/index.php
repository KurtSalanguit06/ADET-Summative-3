<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To Do App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container mt-3">
    <h1>To Do List</h1>
    <a href="add.php" class="btn btn-primary">Add New Task</a>
    <hr>
    <?php include 'view.php'; ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
