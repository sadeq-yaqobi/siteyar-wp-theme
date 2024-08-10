<?php
// Hooking the function to handle both logged-in and non-logged-in users
add_action('wp_ajax_sy_contact', 'sy_contact');
add_action('wp_ajax_nopriv_sy_contact', 'sy_contact');

function sy_contact()
{
    // Verify the nonce for security
    if (!isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
        wp_send_json([
            'error' => true,
            'message' => 'دسترسی غیر مجاز است.', // Unauthorized access message
        ], 403);  // Respond with a 403 Forbidden status code if nonce verification fails
    }

    // Check if any form field is empty
    foreach ($_POST as $field) {
        if (empty($field)) {
            wp_send_json([
                'error' => true,
                'message' => 'تکمیل تمامی فیلد ها الزامی است.' // All fields are required message
            ], 422);  // Respond with a 422 Unprocessable Entity status code
        }
    }

    // Validating Google reCAPTCHA
    $recaptcha = $_POST['recaptcha'];
    $secret_key = 'your secret key';
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
        . $secret_key . '&response=' . $recaptcha;

    // Send a request to Google's reCAPTCHA API to validate the user's response
    $response = file_get_contents($url);
    $response = json_decode($response);

    // If reCAPTCHA validation fails, return an error message
    if (!$response->success) {
        wp_send_json([
            'error' => true,
            'title' => 'دسترسی غیر مجاز است!', // Unauthorized access title
            'message' => 'من ربات نیستم را انتخاب کنید.' // "Please select 'I'm not a robot'" message
        ], 403);  // Respond with a 403 Forbidden status code if reCAPTCHA validation fails
    }

    // Sanitize and retrieve the contact form data
    $full_name = sanitize_text_field($_POST['fullName']);  // Sanitize the full name field
    $email = sanitize_text_field($_POST['email']);  // Sanitize the email field
    $title = sanitize_text_field($_POST['title']);  // Sanitize the title field
    $message = sanitize_textarea_field($_POST['message']);  // Sanitize the message field, allowing for whitespace and new lines

    // Prepare the email headers, setting the content type to HTML
    $header = ['Content-Type: text/html; charset=UTF-8'];

    // Send the email using the wp_mail function
    $send_mail = wp_mail('mohamadi.amir9219@gmail.com', 'ایمیل آزمایشی', MailLayout::contact_layout($full_name, $email, $title, $message), $header);

    // If the email is sent successfully, return a success message
    if ($send_mail) {
        wp_send_json([
            'success' => true,
            'message' => 'درخواست شما با موفقیت ارسال شد.' // Your request has been successfully sent message
        ], 200);  // Respond with a 200 OK status code
    } else {
        // If the email sending fails, return an error message
        wp_send_json([
            'error' => true,
            'message' => 'خطا در ارسال درخواست. لطفا دوباره تلاش کنید.' // Error message: "Failed to send request. Please try again."
        ], 500);  // Respond with a 500 Internal Server Error status code
    }
}

