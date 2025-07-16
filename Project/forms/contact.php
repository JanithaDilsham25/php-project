<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session (if needed)
session_start();

// Include database connection
include "../../connection.php"; 

// Function to sanitize input data
function validate($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if form fields are set
if (isset($_POST['name']) && isset($_POST['email'])) {

    // Sanitize the input data
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);

    // Validate the inputs
    if (empty($name)) {
        echo json_encode(['status' => 'error', 'message' => 'Name is required']);
        exit();
    } else if (empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Email is required']);
        exit();
    } else if (empty($subject)) {
        echo json_encode(['status' => 'error', 'message' => 'Subject is required']);
        exit();
    } else if (empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Message is required']);
        exit();
    }

    // Prepare the SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // Redirect to contact page with success message
        $_SESSION['message'] = "Your message has been sent. Thank you!";
        header("Location: contact.php");
    } else {
        // Redirect to contact page with error message
        $_SESSION['error'] = "There was an error sending your message. Please try again later.";
        header("Location: contact.php");
    }

    // Close the prepared statement
    $stmt->close();
} else {
    header("Location: contact.php");
    exit();
}

// Close the database connection
$conn->close();
?>
