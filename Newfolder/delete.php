<?php
session_start();
require 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteTask($id)) {
        echo '<div class="alert alert-success">Task deleted successfully.</div>';
    } else {
        echo '<div class="alert alert-danger">Failed to delete task.</div>';
    }
} else {
    echo '<div class="alert alert-danger">No task ID specified.</div>';
}
header('Location: index.php');
exit;
?>
