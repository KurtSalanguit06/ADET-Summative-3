<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Initialize the tasks array if it does not exist
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

function addTask($title, $description) {
    // Initialize the tasks array if it does not exist
    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }
    
    $new_id = count($_SESSION['tasks']) + 1;
    $_SESSION['tasks'][] = [
        'id' => $new_id,
        'title' => $title,
        'description' => $description
    ];
    return true;
}

function getTasks() {
    return isset($_SESSION['tasks']) ? $_SESSION['tasks'] : [];
}

function getTaskById($id) {
    foreach ($_SESSION['tasks'] as $task) {
        if ($task['id'] == $id) {
            return $task;
        }
    }
    return null;
}

function editTask($id, $title, $description) {
    foreach ($_SESSION['tasks'] as $key => $task) {
        if ($task['id'] == $id) {
            $_SESSION['tasks'][$key] = [
                'id' => $id,
                'title' => $title,
                'description' => $description
            ];
            return true;
        }
    }
    return false;
}

function deleteTask($id) {
    foreach ($_SESSION['tasks'] as $key => $task) {
        if ($task['id'] == $id) {
            unset($_SESSION['tasks'][$key]);
            $_SESSION['tasks'] = array_values($_SESSION['tasks']);
            return true;
        }
    }
    return false;
}

// User management functions
function registerUser($username, $password) {
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] == $username) {
            return false;
        }
    }

    $_SESSION['users'][] = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];
    return true;
}

function authenticateUser($username, $password) {
    if (isset($_SESSION['users'])) {
        foreach ($_SESSION['users'] as $user) {
            if ($user['username'] == $username && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                return true;
            }
        }
    }
    return false;
}
?>
