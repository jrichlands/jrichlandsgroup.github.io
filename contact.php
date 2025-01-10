<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data to prevent XSS
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
        exit();
    }

    // Set the email recipient
    $to = "info@jrichlandsgroup.com";  // Your email address

    // Set the email headers
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
        // Redirect the user to a thank you page or show a success message
        echo "<script>
                alert('Thank you for your message. We will get back to you soon!');
                window.location.href = 'thank-you.html'; // You can replace this with your actual thank-you page
              </script>";
    } else {
        echo "<script>alert('There was an error sending your message. Please try again later.');</script>";
    }
}
?>
