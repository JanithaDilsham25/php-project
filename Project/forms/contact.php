<?php
// Enable error reporting for debugging (optional)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session (needed for session variables)
session_start();

// Include database connection
include "../../connection.php";

// Function to sanitize input data
function validate($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if form fields are set
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {

    // Sanitize the input data
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);

    // Prepare the SQL query to insert data into the database
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the query
    if ($stmt->execute()) {
        // Data inserted successfully, redirect with success message
        $_SESSION['form_status'] = 'success';
        $_SESSION['success_message'] = 'Your message has been successfully submitted!';
        header("Location: ../contact.html");
        exit();
    } else {
        // If query execution fails, set error message
        $_SESSION['form_status'] = 'error';
        $_SESSION['error_message'] = 'Failed to submit the form. Please try again later.';
        header("Location: ../contact.html");
        exit();
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If form data is not set, redirect with error message
    $_SESSION['form_status'] = 'error';
    $_SESSION['error_message'] = 'Please fill in all fields.';
    header("Location: ../contact.html");
    exit();
}

// Close the database connection
$conn->close();
?>
