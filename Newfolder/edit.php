<?php
session_start();
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    if (editTask($id, $title, $description)) {
        echo '<div class="alert alert-success">Task updated successfully.</div>';
    } else {
        echo '<div class="alert alert-danger">Failed to update task.</div>';
    }
}

if (isset($_GET['id'])) {
    $task = getTaskById($_GET['id']);
    if ($task !== null) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container mt-3">
    <h1>Edit Task</h1>
    <form action="edit.php?id=<?php echo $task['id']; ?>" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required><?php echo htmlspecialchars($task['description']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>

<?php
    } else {
        echo '<div class="alert alert-warning">Task not found.</div>';
    }
} else {
    echo '<div class="alert alert-danger">No task ID specified.</div>';
}
?>
