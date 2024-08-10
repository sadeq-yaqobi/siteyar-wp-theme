<?php
function my_phpmailer_example( $phpmailer ) {
    // Set the mailer to use SMTP
    $phpmailer->isSMTP();

    // Specify the SMTP server to send through
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';

    // Enable SMTP authentication
    $phpmailer->SMTPAuth = true; // This enables authentication using the Username and Password properties

    // Set the SMTP port
    $phpmailer->Port = 2525; // Common ports: 25, 587 (STARTTLS), 465 (SSL)

    // Provide the SMTP username and password for authentication
    $phpmailer->Username = 'Your SMTP username'; // Your SMTP username
    $phpmailer->Password = 'Your SMTP password'; // Your SMTP password

    // Uncomment the line below if using encryption for SMTP (recommended)
    // $phpmailer->SMTPSecure = 'tls'; // Choose 'ssl' for SMTPS on port 465, or 'tls' for SMTP+STARTTLS on port 25 or 587

    // Set the "From" email address
    $phpmailer->From = "info@7learn-wp.local"; // The email address the message will appear to be sent from

    // Set the "From" name
    $phpmailer->FromName = "Sadeq Yaqobi"; // The name the message will appear to be sent from
}

// Hook the function into phpmailer_init to modify the PHPMailer instance before sending emails
add_action( 'phpmailer_init', 'my_phpmailer_example' );

