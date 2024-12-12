<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Form</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        /* Form Container */
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        /* Form Heading */
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Input Fields */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        /* Input Focus Effect */
        input:focus,
        textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Submit Button */
        button {
            width: 100%;
            padding: 14px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Submit Button Hover Effect */
        button:hover {
            background-color: #0056b3;
        }

        /* Error Message */
        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h3>Reset Password</h3>
        <form action="{{ route('user.resetPasswordMail') }}" method="POST">
            @csrf
            <div class="error">
                @if (Session::has('message'))
                    {{ Session::get('message') }}
                @endif
            </div>
            <div>
                <label for="email_address">E-Mail Address</label>
                <input type="email" id="email_address" name="email" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Send Password Reset Link</button>
        </form>
    </div>

</body>
</html>
