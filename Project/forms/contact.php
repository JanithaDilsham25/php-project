<?php
// Enable error reporting for debugging (optional)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session (needed for session variables)
session_start();

// Include database connection
include "../../connection.php";

// Include PHPMailer library
require '../../vendor/autoload.php';  // Adjusted path to vendor

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
        $smtp_username = getenv('MAILERTOGO_SMTP_USER');  // Correct variable name
        $smtp_password = getenv('MAILERTOGO_SMTP_PASSWORD');
        $smtp_host = getenv('MAILERTOGO_SMTP_HOST');
        $smtp_port = getenv('MAILERTOGO_SMTP_PORT');

        // Create PHPMailer instance
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Server settings
        $mail->isSMTP();  // Use SMTP
        $mail->Host = $smtp_host;  // Mailer To Go SMTP host
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = $smtp_username;  // SMTP username (Mailer's username)
        $mail->Password = $smtp_password;  // SMTP password (Mailer’s password)
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;  // Encryption type (TLS)
        $mail->Port = $smtp_port;  // Mailer To Go SMTP port (typically 587 for TLS)

        // Recipients
        $mail->setFrom('arachchi12911@usci.ruh.ac.lk', 'php-project');  // Sender's email address
        $mail->addAddress('janithadilsham@gmail.com', 'Janita Dilsham');  // Recipient's email address

        // Content of the email
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = "New message from contact form";  // Email subject
        $mail->Body    = "
            You have received a new message from your website contact form.\n\n
            Here are the details:\n\n
            Name: $name\n
            Email: $email\n
            Subject: $subject\n
            Message: $message
        ";  // Email body content

        // Send the email
        if ($mail->send()) {
            // Email sent successfully, redirect with success
            $_SESSION['form_status'] = 'success';
            header("Location: ../contact.html");
            exit();
        } else {
            // If email fails to send, log the error and redirect with an error message
            error_log("Mailer Error: " . $mail->ErrorInfo);  // Log error to Heroku logs
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
