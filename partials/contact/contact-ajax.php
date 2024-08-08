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
        ], 403);
    }
    foreach ($_POST as $field) {
        if (empty($field)) {
            wp_send_json([
                'error'=>true,
                'message'=>'تکمیل تمامی فیلد ها الزامی است.'
            ], 422);//The HTTP 422 status code, also known as "Unprocessable Entity,"
        }
    }
    $full_name = sanitize_text_field($_POST['fullName']);
    $email = sanitize_text_field($_POST['email']);
    $title = sanitize_text_field($_POST['title']);
    $message = sanitize_textarea_field($_POST['message']); //The function is like sanitize_text_field() , but preserves new lines (\n) and other whitespace, which are legitimate input in textarea elements.

    //send mail
    $header=['Content-Type: text/html; charset=UTF-8'];

   $send_mail= wp_mail('mohamadi.amir9219@gmail.com', ' ایمیل آزمایشی', MailLayout::contact_layout($full_name,$email , $title, $message),$header);
    if ($send_mail) {
        wp_send_json([
            'success'=>true,
            'message'=>'درخواست شما با موفقیت ارسال شد.'
        ], 200);
    } else {
        wp_send_json([
            'error'=>true,
            'message'=>'خطا در ارسال درخواست. لطفا دوباره تلاش کنید.'
        ], 500);  // Use 500 status code for failure
    }
}