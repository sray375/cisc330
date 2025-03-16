<?php
session_start();

class NoteController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';

            // Convert special characters to HTML entities
            $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

            // Validation
            if (strlen($title) < 4) {
                $_SESSION['error'] = 'Title must be at least 4 characters long.';
            } elseif (strlen($description) < 11) {
                $_SESSION['error'] = 'Description must be at least 11 characters long.';
            } else {
                $_SESSION['success'] = 'Note added successfully!';
            }
            header('Location: /');
            exit;
        }
    }
}

$controller = new NoteController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Note</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Create a Note</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <p class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .container { width: 300px; text-align: center; }
        input, textarea { width: 100%; margin: 10px 0; padding: 8px; }
        button { padding: 8px 15px; cursor: pointer; }
        .error { color: red; }
        .success { color: green; }
    </style>
</body>
</html>
