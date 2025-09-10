<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    $to = "dominicnjangnabe18@gmail.com"; // Your email address
    $subject = "New Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        header("Location: contact.html?status=success");
        exit;
    } else {
        header("Location: contact.html?status=error");
        exit;
    }
} else {
    header("Location: contact.html?status=invalid");
    exit;
}
?>