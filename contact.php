<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@jrichlandsgroup.com";  // Your email address
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];

    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Compose the email body
    $email_body = "<html><body>";
    $email_body .= "<h2>Contact Form Submission</h2>";
    $email_body .= "<p><strong>Name:</strong> " . $fullname . "</p>";
    $email_body .= "<p><strong>Email:</strong> " . $email . "</p>";
    $email_body .= "<p><strong>Phone:</strong> " . $phone . "</p>";
    $email_body .= "<p><strong>Subject:</strong> " . $subject . "</p>";
    $email_body .= "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";
    $email_body .= "</body></html>";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<script>alert('Thank you for your message. We will get back to you soon!');</script>";
    } else {
        echo "<script>alert('There was an error sending your message. Please try again later.');</script>";
    }
}
?>
