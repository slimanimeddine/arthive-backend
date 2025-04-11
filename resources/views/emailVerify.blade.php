<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #333333;
            font-size: 24px;
        }

        .content {
            font-size: 16px;
            line-height: 1.5;
            color: #555555;
        }

        .code {
            display: block;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            margin: 20px 0;
            padding: 10px;
            background-color: #f0f8ff;
            border: 1px solid #cce5ff;
            border-radius: 4px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #999999;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Email Verification Code</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>Thank you for signing up! Please use the following verification code to verify your email address:</p>
            <span class="code">{{ $email_verification_code }}</span>
            <p>If you did not request this code, please ignore this email.</p>
        </div>
        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>

</html>