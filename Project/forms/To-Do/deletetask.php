<?php
session_start();
if (!isset($_SESSION['user'])) exit;

require 'db.php';
$id = $_POST['id'];
$conn->query("DELETE FROM tasks WHERE id = $id");
