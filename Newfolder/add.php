<?php
session_start();
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    if (addTask($title, $description)) {
        echo '<div class="alert alert-success">Task added successfully.</div>';
    } else {
        echo '<div class="alert alert-danger">Failed to add task.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container mt-3">
    <h1>Add Task</h1>
    <form action="add.php" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
