<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form fields and sanitize the input
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Set the recipient email address
    $to = "nkinzingaboalafa@gmail.com";

    // Set the email subject
    $email_subject = "New Message from Contact Form: $subject";

    // Compose the email message
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message: \n$message\n";

    // Set the email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\n";

    // Send the email
    mail($to, $email_subject, $email_body, $headers);

    // Return a success message
    header("HTTP/1.1 200 OK");
    echo "Your message has been sent. Thank you!";
    exit;
}

?>
