<?php
// Enable error reporting for debugging (optional)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session (needed for session variables)
session_start();
require "../../connection.php";

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Adjust the path to the autoload file
require "../php-project/vendor/autoload.php"; // Adjust relative path

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
            // Enable SMTP debugging
            $mail->SMTPDebug = 2; // Enables detailed SMTP debug output
            $mail->Debugoutput = 'html'; // Output in HTML format for better readability

            // SMTP settings
            $mail->isSMTP();
            $mail->Host = getenv('MAILERTOGO_SMTP_HOST');  // Mailer to Go SMTP server (smtp.us-west-1.mailertogo.net)
            $mail->SMTPAuth = true;
            $mail->Username = getenv('MAILERTOGO_SMTP_USER');  // Your Mailer to Go SMTP username
            $mail->Password = getenv('MAILERTOGO_SMTP_PASSWORD');  // Your Mailer to Go SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;  // Port for Mailer to Go (587 for TLS)

            // Set the "From" email (Mailer to Go generated email address)
            $mail->setFrom('postmaster@php-project.mailertogo.com', 'Website Contact Form');
            $mail->addAddress('janitha1717@gmail.com', 'Janitha Dilsham');  // Recipient email

            // Email content
            $mail->Subject = 'New Message from Contact Form';
            $mail->Body    = "Name: $name <br>Email: $email <br>Subject: $subject <br>Message: $message";

            // Send the email
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
