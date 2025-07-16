<?php
// Include the database connection
include('../connection.php');

// Add a new task
if (isset($_POST['todoi'])) {
    // Sanitize input
    $task = $conn->real_escape_string(trim($_POST['task']));
    
    if (!empty($task)) {
        // Insert the task into the database
        $stmt = $conn->prepare("INSERT INTO todo_list (task, mark) VALUES (?, ?)");
        $mark = 'Uncome'; // Default mark
        $stmt->bind_param("ss", $task, $mark);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect back to the index page after adding
    header("Location: index.php");
    exit;
}

// Delete a task
if (isset($_POST['delete_task'])) {
    // Get the task ID
    $task_id = $_POST['task_id'];

    // Delete the task from the database
    $stmt = $conn->prepare("DELETE FROM todo_list WHERE todo_id = ?");
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the index page after deleting
    header("Location: index.php");
    exit;
}
?>
