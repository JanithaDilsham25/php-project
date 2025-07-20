<?php
// Enable error reporting for debugging (optional)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session (needed for session variables)
session_start();

// Include database connection
include "../../connection.php";

// Include PHPMailer library
require '../../vendor/autoload.php';  // Make sure the path is correct

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

    // Prepare the SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the query
    if ($stmt->execute()) {
        // Send email notification after successful form submission

        // Get SMTP credentials from Heroku environment variables
        $smtp_username = getenv('MAILERTOGO_SMTP_USERNAME');
        $smtp_password = getenv('MAILERTOGO_SMTP_PASSWORD');
        $smtp_host = getenv('MAILERTOGO_SMTP_HOST');
        $smtp_port = getenv('MAILERTOGO_SMTP_PORT');

        // Create PHPMailer instance
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Server settings
        $mail->isSMTP();
        $mail->Host = $smtp_host;  // Mailer To Go SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;  // SMTP username
        $mail->Password = $smtp_password;  // SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $smtp_port;  // Typically 587 for TLS

        // Recipients
        $mail->setFrom('arachchi12911@usci.ruh.ac.lk', 'php-project');
        $mail->addAddress('janithadilsham@gmail.com', 'Janita Dilsham');  // Replace with your email

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New message from contact form";
        $mail->Body    = "
        You have received a new message from your website contact form.\n\n
        Here are the details:\n\n
        Name: $name\n
        Email: $email\n
        Subject: $subject\n
        Message: $message
        ";

        // Send the email
        if ($mail->send()) {
            // Redirect after successful form submission
            $_SESSION['form_status'] = 'success';
            header("Location: ../contact.html");
            exit();
        } else {
            // If email fails to send
            $_SESSION['form_status'] = 'error';
            $_SESSION['error_message'] = 'Form submitted, but email could not be sent. Please try again later.';
            header("Location: ../contact.html");
            exit();
        }
    } else {
        // If query execution fails, set error message
        $_SESSION['form_status'] = 'error';
        $_SESSION['error_message'] = 'Failed to submit form. Please try again later.';
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
