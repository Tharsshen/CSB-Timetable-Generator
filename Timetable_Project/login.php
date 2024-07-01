<?php
session_start(); // Start session to manage user session variables

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Validate username and password (replace with your own validation logic)
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Example validation (replace with your own secure authentication logic)
        if ($username === "admin" && $password === "password") {
            // Authentication successful, set session variables
            $_SESSION["username"] = $username;
            header("Location: dashboard.php"); // Redirect to dashboard or another page
            exit();
        } else {
            $error = "Invalid username or password."; // Display error if authentication fails
        }
    } else {
        $error = "Please enter both username and password."; // Display error if fields are empty
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('img/background.jpg'); /* Replace 'background.jpg' with your image file */
            background-size: cover;
            background-position: center;
            color: #fff; /* Set all text color to white */
        }
        .container {
            width: 600px; /* Increased width for a larger box */
            margin: 100px auto; /* Center horizontally */
            background: rgba(0, 102, 153, 0.8); /* Background color #006699 with 80% transparency */
            padding: 40px; /* Increased padding for better spacing */
            border-top-left-radius: 150px; /* Rounded top-left corner */
            border-top-right-radius: 0; /* Normal (square) top-right corner */
            border-bottom-left-radius: 0; /* Normal (square) bottom-left corner */
            border-bottom-right-radius: 0; /* Normal (square) bottom-right corner */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative; /* Ensure relative positioning for absolute logo */
        }

        h2 {
            font-size: 50px; /* Increased font size for the heading */
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 200px; /* Adjust size as needed */
            height: auto;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 5px solid #000; /* Thick black border */
            border-radius: 30px; /* Rounded corners */
            outline: none;
            font-size: 16px;
            text-align: left; /* Right align text */
            background-color: transparent; /* Transparent background */
            color: #fff; /* White text */
        }
        /* Custom checkbox style */
        .remember-me {
            float: left; /* Align left */
            margin-top: 8px; /* Adjust vertical alignment */
            position: relative;
            cursor: pointer;
            display: inline-flex; /* Ensure inline display for checkbox and label */
            align-items: center; /* Center align items vertically */
        }
        .remember-me input[type="checkbox"] {
            display: none; /* Hide default checkbox */
        }
        .remember-me .checkmark {
            position: relative;
            height: 18px; /* Adjust size to match text */
            width: 18px; /* Adjust size to match text */
            margin-right: 10px; /* Space between checkbox and text */
            border-radius: 50%;
            border: 3px solid #fff; /* Thick white outline */
        }
        .remember-me input[type="checkbox"]:checked + .checkmark::after {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 8px;
            width: 8px;
            background-color: #fff; /* White center */
            border-radius: 50%;
        }
        .remember-me label {
            color: #fff; /* Set label text color to white */
            cursor: pointer;
        }
        .forgot-password {
            float: right;
            margin-top: 5px;
            text-decoration: underline;
            cursor: pointer;
            color: #fff; /* Set text color to white */
        }
        .login-btn {
            background-color: #2B292A;
            color: #fff;
            border: none;
            padding: 20px 100px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 40px;
            margin-top: 80px;
            margin-left: auto; /* Center horizontally */
            margin-right: auto; /* Center horizontally */
            display: block; /* Ensures button takes full width within container */
        }


        .register-link {
            margin-top: 40px; /* Increased margin-top */
            color: #fff; /* Set link text color to white */
            text-decoration: none;
            display: block; /* Display as block to take full width */
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <img src="img/logo.png" alt="Logo" class="logo"> <!-- Replace 'logo.png' with your logo image file -->
    <div class="container">
        <h2>Sign In</h2>

        <!-- Display error message if authentication fails -->
        <?php if (isset($error)) : ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label class="remember-me">
                    <input type="checkbox" name="remember_me">
                    <span class="checkmark"></span>
                    Remember me
                </label>
                <span class="forgot-password">Forgot Password</span>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
        <a href="register.php" class="register-link">Don’t have an account? Register here</a>
    </div>
</body>
</html>
