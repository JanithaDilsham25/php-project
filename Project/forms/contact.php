<?php

require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

        try {
            // Get Mailgun credentials from Heroku environment variables
            $mailgun_domain = getenv('MAILGUN_DOMAIN');  // Mailgun domain (e.g., sandbox123.mailgun.org)
            $mailgun_api_key = getenv('MAILGUN_API_KEY');  // Mailgun API key

            // Mailgun SMTP settings
            $smtp_host = 'smtp.mailgun.org';
            $smtp_port = 587;

            // Create the PHPMailer instance
            $mail = new PHPMailer(true);
            $mail->isSMTP();  // Set mailer to use SMTP
            $mail->Host = $smtp_host;  // Set Mailgun's SMTP server
            $mail->SMTPAuth = true;  // Enable SMTP authentication
            $mail->Username = 'postmaster@' . $mailgun_domain;  // Mailgun SMTP username (postmaster@domain)
            $mail->Password = $mailgun_api_key;  // Mailgun SMTP API key
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
            $mail->Port = $smtp_port;  // Set the SMTP port (587 for TLS)

            // Recipients
            $mail->setFrom($email, $name);  // Sender's email
            $mail->addAddress('janithadilsham@gmail.com', 'Janitha Dilsham');  // Your email address

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = "New Contact Form Submission: $subject";
            $mail->Body    = "You have received a new message from your website contact form.<br><br>".
                            "Name: $name<br>Email: $email<br>Subject: $subject<br>Message:<br>$message";

            // Send the email
            $mail->send();

            // Data inserted successfully, redirect with success message
            $_SESSION['form_status'] = 'success';
            $_SESSION['success_message'] = 'Your message has been successfully submitted!';
            header("Location: ../contact.html");
            exit();
        } catch (Exception $e) {
            // If email sending fails, set error message
            $_SESSION['form_status'] = 'error';
            $_SESSION['error_message'] = 'Failed to send email. Please try again later.';
            header("Location: ../contact.html");
            exit();
        }
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
