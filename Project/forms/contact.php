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
require __DIR__ . '../../../vendor/autoload.php'; // Adjust relative path

// Function to sanitize input data
function validate($data)
{
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
            $mail->Host = 'smtp.gmail.com';  // Gmail's SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'janithadilsham@gmail.com';  // Your Gmail address
            $mail->Password = 'ptdazwhvnkfmuzli';  // Your Gmail password or app-specific password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('janithadilsham@gmail.com', 'Test Sender');
            $mail->addAddress('janitha1717@gmail.com', 'Test User');  // Send to any email
            $mail->Subject = 'Test Email via Gmail';
            $mail->Body    = 'This is a test email sent via Gmail SMTP.';

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
