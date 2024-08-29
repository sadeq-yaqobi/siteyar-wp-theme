<?php

class MailLayout
{
    public static function contact_layout(string $full_name, string $email, string $title, string $message): string
    {
        // Define the email layout
        return '
        <!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Import Google Fonts */
        @import url("https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap");
        
        /* Add the rest of your styles */
        body {
            font-family: \'Vazirmatn\', Tahoma, Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            direction: rtl;
            text-align: right;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background-image: linear-gradient(to right, #f9f9f9, #f1f1f1);
        }
        .header {
            text-align: center;
            padding-bottom: 30px;
        }
        .header img {
            width: 90px;
            height: auto;
        }
        .header h1 {
            font-size: 28px;
            color: #333333;
            margin: 20px 0 10px;
            font-weight: 700;
        }
        .content {
            text-align: right;
            color: #444444;
        }
        .content p {
            font-size: 18px;
            color: #444444;
            line-height: 1.8;
            margin: 20px 0;
        }
        .content .info {
            background-color: #e8e8e8;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            color: #333333;
        }
        .content .info p {
            margin: 10px 0;
            font-size: 16px;
        }
        .content .message {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            margin: 25px 0;
            border: 1px solid #cccccc;
            color: #333333;
        }
        .footer {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #dddddd;
            margin-top: 30px;
        }
        .footer p {
            font-size: 14px;
            color: #777777;
        }
        .footer a img {
            width: 26px;
            height: auto;
            margin: 0 12px;
        }
        .footer a {
            color: #555555;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
<<<<<<< HEAD
            <img src="' . get_template_directory_uri() . '/assets/img/webp/logo.webp" alt="Logo">
=======
            <img src="' . get_template_directory_uri() . '/assets/img/logo.png" alt="Logo">
>>>>>>> 1a90ab4 (main local)
            <h1>پیام شما دریافت شد.</h1>
        </div>
        <div class="content">
            <p><strong>' . $full_name . '</strong> عزیز</p>
             <p>از تماس شما ممنونیم. تیم ما به زودی با شما تماس می‌گیرد.</p>
            <div class="info">
                <p><strong>ایمیل شما:</strong> ' . $email . '</p>
                <p><strong>عنوان درخواست:</strong> ' . $title . '</p>
            </div>
            <div class="message">
                <p><strong>پیام شما:</strong></p>
                <p>' . $message . '</p>
            </div>
            <small>سوالات و نظرات خود را با ما از طریق <a href="mailto:info@7learn-wp.local" style="color: #333333; text-decoration: none;">info@7learn-wp.local</a> در میان بگذارید.</small>
        </div>
        <div class="footer">
            <p>ما را در شبکه‌های اجتماعی دنبال کنید:</p>
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook"></a>
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/X_icon_2.svg" alt="Twitter"></a>
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram"></a>
            <p>کلیه حقوق برای سایت یار محفوظ است 2024 &copy;</p>
        </div>
    </div>
</body>
</html>
        ';
    }
}
