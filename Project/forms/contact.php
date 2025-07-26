<?php
// Enable error reporting for debugging (optional)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session (needed for session variables)
session_start();

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Adjust the path to the autoload file
require '../../vendor/autoload.php'; // Adjust relative path

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
        // Data inserted successfully, send email notification using Mailer to Go SMTP

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();  // Set mailer to use SMTP
            $mail->Host = getenv('MAILERTOGO_SMTP_HOST');  // Mailer to Go SMTP server (smtp.us-west-1.mailertogo.net)
            $mail->SMTPAuth = true;  // Enable SMTP authentication
            $mail->Username = getenv('MAILERTOGO_SMTP_USER');  // Your Mailer to Go SMTP username
            $mail->Password = getenv('MAILERTOGO_SMTP_PASSWORD');  // Your Mailer to Go SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
            $mail->Port = getenv('MAILERTOGO_SMTP_PORT');  // Port for Mailer to Go (587 for TLS)

            // Recipients
            $mail->setFrom('postmaster@php-project.mailertogo.com', 'Website Contact Form');  // Sender email
            $mail->addAddress('janithadilsham@gmail.com', 'Janitha Dilsham');  // Recipient email (you)

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'New Message from Contact Form';
            $mail->Body    = "<strong>Name:</strong> $name <br><strong>Email:</strong> $email <br><strong>Subject:</strong> $subject <br><strong>Message:</strong> $message";

            // Send email
            $mail->send();

            // Data inserted successfully, redirect with success message
            $_SESSION['form_status'] = 'success';
            $_SESSION['success_message'] = 'Your message has been successfully submitted!';
            header("Location: ../contact.html");
            exit();
        } catch (Exception $e) {
            // If email fails to send, store error message
            $_SESSION['form_status'] = 'error';
            $_SESSION['error_message'] = 'Failed to send the email. Error: ' . $mail->ErrorInfo;
            header("Location: ../contact.html");
            exit();
        }

    } else {
        $_SESSION['form_status'] = 'error';
        $_SESSION['error_message'] = 'Failed to submit the form. Please try again later.';
        header("Location: ../contact.html");
        exit();
    }

    // Close the prepared statement
    $stmt->close();
} else {
    $_SESSION['form_status'] = 'error';
    $_SESSION['error_message'] = 'Please fill in all fields.';
    header("Location: ../contact.html");
    exit();
}

// Close the database connection
$conn->close();
?>
