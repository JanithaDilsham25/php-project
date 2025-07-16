<?php

session_start();
include "../php-project/connection.php";

function validate($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
    $name    = validate($_POST['name']);
    $email   = validate($_POST['email']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);

    if (empty($name)) {
        header("Location: contact.php?error=Name is required");
        exit();
    } else if (empty($email)) {
        header("Location: contact.php?error=Email is required");
        exit();
    } else if (empty($subject)) {
        header("Location: contact.php?error=Subject is required");
        exit();
    } else if (empty($message)) {
        header("Location: contact.php?error=Message is required");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        header("Location: contact.php?success=Message sent successfully");
        exit();
    } else {
        header("Location: contact.php?error=Failed to send message");
        exit();
    }
} else {
    header("Location: contact.php?error=Please fill in all fields");
    exit();
}
