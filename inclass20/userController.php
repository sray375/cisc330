<?php
// Database Connection
$host = 'localhost';
$dbname = 'your_database';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to sanitize and validate input
function validateInput($data) {
    $errors = [];
    $title = trim(filter_var($data['title'], FILTER_SANITIZE_STRING));
    $content = trim(filter_var($data['content'], FILTER_SANITIZE_STRING));

    if (empty($title) || strlen($title) < 3) {
        $errors['title'] = "Title must be at least 3 characters.";
    }
    if (empty($content) || strlen($content) < 5) {
        $errors['content'] = "Content must be at least 5 characters.";
    }

    return empty($errors) ? ['title' => $title, 'content' => $content] : $errors;
}

// CREATE Post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $validated = validateInput($_POST);
    
    if (!is_array($validated) || isset($validated['title'])) {
        echo json_encode(['error' => $validated]);
        exit();
    }

    try {
        $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
        $stmt->execute($validated);
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// READ Posts
try {
    $posts = $conn->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching posts: " . $e->getMessage());
}

// UPDATE Post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $validated = validateInput($_POST);

    if (!$id || !is_array($validated) || isset($validated['title'])) {
        echo json_encode(['error' => $validated]);
        exit();
    }

    try {
        $stmt = $conn->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
        $stmt->execute(['id' => $id, 'title' => $validated['title'], 'content' => $validated['content']]);
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// DELETE Post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
        echo json_encode(['error' => 'Invalid ID']);
        exit();
    }

    try {
        $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Posts</h1>
    
    <!-- Create Post Form -->
    <form method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <button type="submit" name="create">Create Post</button>
    </form>
    
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                
                <!-- Update Form -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>">
                    <textarea name="content"><?= htmlspecialchars($post['content']) ?></textarea>
                    <button type="submit" name="update">Update</button>
                </form>

                <!-- Delete Form -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
