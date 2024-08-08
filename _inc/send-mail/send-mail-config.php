<?php
function my_phpmailer_example( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true; // Ask it to use authenticate using the Username and Password properties
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'e8bf6768ac26ba';
    $phpmailer->Password = '9a07150767d940';

    // Additional settings…
    //$phpmailer->SMTPSecure = 'tls'; // Choose 'ssl' for SMTPS on port 465, or 'tls' for SMTP+STARTTLS on port 25 or 587
    $phpmailer->From = "info@7learn-wp.local";
    $phpmailer->FromName = "Sadeq Yaqobi";
}
add_action( 'phpmailer_init', 'my_phpmailer_example' );
