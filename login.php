<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(135deg, #000000, #008000);
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 10px;
            padding: 40px; /* Increased padding */
            width: 400px; /* Increased width */
            max-width: 80%; /* Added max-width */
            text-align: center; /* Center align content */
        }
        .login-header {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .btn-primary {
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            color: white;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .alert {
            background-color: #333;
            color: #f8f9fa;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .signup-link {
            display: block;
            margin-top: 20px;
            color: #c7ecee; /* Light green color */
            text-decoration: none;
        }
        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">Login to our website</div>
        <?php 
            if($login) {
                echo '<div class="alert" role="alert">
                        Success! You are logged in
                    </div>';
            }
            if($showError) {
                echo '<div class="alert" role="alert">
                        Error! '.$showError.'
                    </div>';
            }
        ?>
        <form action="/Spotify clone/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
        <a href="signup.php" class="signup-link">Don't have an account? Sign up here</a>
    </div>
</body>
</html>


