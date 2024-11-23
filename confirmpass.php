<?php

// Check if the token is set in the URL
if (!isset($_GET["token"])) {
    die("Token is missing.");
}

$token = $_GET["token"];

$token_hash = hash('sha256', $token);

$mysqli = require __DIR__ . "/config.php";

$sql = "SELECT * FROM users 
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if($user === null) {
    die("Invalid Token");
}

if(strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token Expired");
}

echo "Token is valid and hasn't expired";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('background/lightbg.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 35px;
        }
        .input-container {
            position: relative;
            margin-bottom: 30px;
        }
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
            transition: all 0.3s ease;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="password"]:focus,
        input[type="text"]:focus {
            outline: none;
            border-bottom-color: #007bff;
        }
        .input-container label {
            position: absolute;
            top: 10px;
            left: 0;
            font-size: 16px;
            color: #999;
            transition: all 0.3s ease;
            pointer-events: none;
        }
        .input-container input:focus + label,
        .input-container input:not(:placeholder-shown) + label {
            top: -20px;
            font-size: 12px;
            color: #007bff;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #4CAF50, #45a049);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(76, 175, 80, 0.1);
        }
        button:hover {
            background: linear-gradient(to right, #45a049, #3d8b3d);
            box-shadow: 0 6px 8px rgba(76, 175, 80, 0.2);
            transform: translateY(-2px);
        }
        button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(76, 175, 80, 0.1);
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
            font-size: 14px; /* Reduced font size */
        }
    </style>
    <script>
        function validateForm(event) {
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (newPassword !== confirmPassword) {
                event.preventDefault(); // Prevent form submission
                alert("Passwords do not match. Please try again.");
            }
        }

        function togglePassword(inputId, event) {
            const input = document.getElementById(inputId);
            const icon = event.target;
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
            
            // Prevent default action and stop propagation
            event.preventDefault();
            event.stopPropagation();
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        <form id="passwordForm" onsubmit="validateForm(event)" method="POST" action="process-reset-password.php">
            <div class="input-container">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                
                <input type="password" id="newPassword" name="newPassword" required placeholder=" ">
                <label for="newPassword">New Password</label>
                <i class="password-toggle fas fa-eye-slash" onmousedown="togglePassword('newPassword', event)"></i>
            </div>
            <div class="input-container">
                <input type="password" id="confirmPassword" name="confirmPassword" required placeholder=" ">
                <label for="confirmPassword">Confirm New Password</label>
                <i class="password-toggle fas fa-eye-slash" onmousedown="togglePassword('confirmPassword', event)"></i>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
