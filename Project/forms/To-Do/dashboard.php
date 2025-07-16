<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
require 'db.php';

$tasks = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="todo-container">
    <h2>Welcome, <?= $_SESSION['user'] ?> <a href="logout.php">[Logout]</a></h2>

    <form id="task-form">
        <input type="text" id="task-input" placeholder="Enter a task" required />
        <button type="submit">Add Task</button>
    </form>

    <ul id="task-list">
        <?php while ($row = $tasks->fetch_assoc()): ?>
            <li data-id="<?= $row['id'] ?>">
                <?= htmlspecialchars($row['task']) ?>
                <button class="delete-btn">X</button>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

<script src="script.js"></script>
</body>
</html>
