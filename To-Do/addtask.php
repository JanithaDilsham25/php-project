<?php
session_start();
if (!isset($_SESSION['user'])) exit;

require 'db.php';
$task = $_POST['task'];

if (!empty($task)) {
    $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->bind_param("s", $task);
    $stmt->execute();
    echo $conn->insert_id;
}
