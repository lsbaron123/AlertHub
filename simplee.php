<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database configuration
$con = require __DIR__ . "/config.php"; // Ensure this returns a valid MySQLi connection

// Check if the connection was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Assuming you have a login form that sends 'username' and 'password'
    $email = $_POST['email'] ?? ''; // Use null coalescing to avoid undefined index
    $password = $_POST['password'] ?? '';

    // Escape the input to prevent SQL injection
    $username = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // Prepare the SQL statement
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $con->error); // Output the error if prepare fails
    }

    // Bind parameters
    $stmt->bind_param("ss", $username, $password); // Use $username instead of $email

    // Execute the statement
    $stmt->execute();

    // Get the result set from the prepared statement
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, check user type
        $user = $result->fetch_assoc(); // Fetch the user data
        if ($user['user_type'] === 'admin') {
            header("Location: Administrator.php"); // Redirect to admin dashboard
            exit();
        } else {
            header("Location: User.php"); // Redirect to user dashboard
            exit();
        }
    } else {
        // User not found
        $login_error = "Invalid email or password."; // Set error message only if login fails
    }

    // Close the statement and connection
    $stmt->close();
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registration</title>
    <link rel="icon" href="Logo/favicon-32x32.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('Background/lightbg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            transition: background-image 0.3s ease;
        }
        body.dark-theme {
            background-image: url('Background/darkbg.jpg');
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgb(0, 0, 0);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            position: relative;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-sizing: border-box;
        }
        .dark-theme .form-container {
            background-color: rgba(17, 16, 16, 0.9);
            color: #fff;
        }
        .theme-toggle {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .dark-theme .theme-toggle {
            color: #fff;
        }
        h2 {
            text-align: center;
            color: #333;
            transition: color 0.3s ease;
        }
        .dark-theme h2 {
            color: #fff;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .input-group {
            display: flex;
            flex-direction: column;
        }
        .name-fields {
            display: flex;
            gap: 15px;
        }
        .name-fields .input-group {
            flex: 1;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        .dark-theme input {
            background-color: #333;
            color: #fff;
            border-color: #555;
        }
    
        .password-wrapper {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            margin-top: 8px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .strength-meter {
            height: 5px;
            width: 100%;
            background-color: #ddd;
            margin-top: 5px;
        }
        .strength-meter-fill {
            height: 100%;
            width: 0;
            transition: width 0.3s ease, background-color 0.3s ease;
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .remember-me input {
            margin-right: 5px;
            width: auto;
            margin-top: -3.5px;
            width: 15px;
            height: 15px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #307e33;
            transform: scale(1.03);
        }
        input[type="submit"]:active {
            transform: scale(0.95);
        }

        .toggle-form {
            text-align: center;
            margin-top: 20px;
            cursor: pointer;
            color: #4CAF50;
            transition: color 0.3s ease;
        }
        .toggle-form:hover {
            color: #00ff0d;
        }

        .dark-theme .toggle-form {
            color: #6ECF73;
        }

        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }

        .message.error {
            background-color: #ffcccc;
            color: #cc0000;
        }

        .message.success {
            background-color: #ccffcc;
            color: #006600;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="theme-toggle" onclick="toggleTheme()">
            <i class="fas fa-moon"></i>
        </div>
        
        <div id="login-form">
            <h2>Login Form</h2>
            <?php
            if (!empty($login_error)) {
                echo '<div class="message error">' . htmlspecialchars($login_error) . '</div>'; // Display error message
            }
            ?>
            <form action="" method="post">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" autocomplete="off" required>
                </div>
                
                <div class="input-group">
                    <div class="password-wrapper">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <i class="fas fa-eye password-toggle" onclick="togglePasswordVisibility('password', this)"></i>
                    </div>
                </div>
                
                <div class="remember-me" style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <input type="checkbox" id="remember-me" name="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                
                <input type="submit" name="submit" value="Login">
            </form>
            <div class="toggle-form" onclick="toggleForm()">Don't have an Account Yet?</div>
        </div>

        <div id="registration-form" style="display: none;">
            <h2>Registration Form</h2>
            <?php
            if (!empty($registration_message)) {
                echo $registration_message;
            }
            ?>
            <form action="" method="post">
                <div class="name-fields">
                    <div class="input-group">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($fname ?? ''); ?>" autocomplete="off" required>
                    </div>
                    <div class="input-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($lname ?? ''); ?>" autocomplete="off" required>
                    </div>
                </div>
                
                <div class="input-group">
                    <label for="reg-email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" autocomplete="off" required>
                </div>
                
                <div class="input-group">
                    <label for="mobile">Mobile Number:</label>
                    <input type="tel" id="mobile" name="mobile" value="<?php echo htmlspecialchars($mobile ?? ''); ?>" autocomplete="off" required pattern="[0-9]{11}" title="Please enter a valid 11-digit mobile number">
                </div>
                
                <div class="input-group">
                    <div class="password-wrapper">
                        <label for="reg-password">Password:</label>
                        <input type="password" id="reg-password" name="password" required onkeyup="checkPasswordStrength(this.value)">
                        <i class="fas fa-eye password-toggle" onclick="togglePasswordVisibility('reg-password', this)"></i>
                    </div>
                    <div class="strength-meter">
                        <div class="strength-meter-fill"></div>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="password-wrapper">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                        <i class="fas fa-eye password-toggle" onclick="togglePasswordVisibility('confirm-password', this)"></i>
                    </div>
                </div>
                
                <input type="submit" value="Register" name="register">
            </form>
            <div class="toggle-form" onclick="toggleForm()">Already have an account?</div>
        </div>
    </div>

    <script>
        function toggleForm() {
            var loginForm = document.getElementById('login-form');
            var registrationForm = document.getElementById('registration-form');
            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registrationForm.style.display = 'none';
            } else {
                loginForm.style.display = 'none';
                registrationForm.style.display = 'block';
            }
        }

        function toggleTheme() {
            document.body.classList.toggle('dark-theme');
            var themeIcon = document.querySelector('.theme-toggle i');
            themeIcon.classList.toggle('fa-moon');
            themeIcon.classList.toggle('fa-sun');
        }

        function togglePasswordVisibility(inputId, icon) {
            var input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }

        function checkPasswordStrength(password) {
            var strength = 0;
            if (password.match(/[a-z]+/)) strength += 1;
            if (password.match(/[A-Z]+/)) strength += 1;
            if (password.match(/[0-9]+/)) strength += 1;
            if (password.match(/[$@#&!]+/)) strength += 1;

            var meter = document.querySelector(".strength-meter-fill");
            meter.style.width = (strength / 4) * 100 + "%";
            
            if (strength < 2) meter.style.backgroundColor = "#ff4d4d";
            else if (strength < 4) meter.style.backgroundColor = "#ffa64d";
            else meter.style.backgroundColor = "#4CAF50";
        }

        function validateForm() {
            var password = document.getElementById("reg-password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            var mobileNumber = document.getElementById("mobile").value;
            
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            
            if (!/^\d{11}$/.test(mobileNumber)) {
                alert("Please enter a valid 11-digit mobile number!");
                return false;
            }
            
            return true;
        }

        // Ensure the registration form is displayed if there's a registration message
        <?php if (!empty($registration_message)): ?>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('registration-form').style.display = 'block';
        });
        <?php endif; ?>
    </script>
</body>
</html>
