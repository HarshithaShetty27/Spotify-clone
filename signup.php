<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .signup-container {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 10px;
            padding: 40px;
            width: 400px;
            max-width: 80%;
            text-align: center;
        }
        .signup-header {
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
        .login-link {
            display: block;
            margin-top: 20px;
            color: #c7ecee; /* Light green color */
            text-decoration: none;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-header">Sign Up for our website</div>
        <?php 
            if($showAlert) {
                echo '<div class="alert" role="alert">
                        Success! Your account is now created. You can <a href="/Spotify clone/login.php" class="alert-link">login here</a>.
                    </div>';
            }
            if($showError) {
                echo '<div class="alert" role="alert">
                        Error! '.$showError.'
                    </div>';
            }
        ?>
        <form action="/Spotify clone/signup.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" required>
                <small class="form-text text-muted">Make sure to type the same password</small>
            </div>
            <button type="submit" class="btn-primary">Sign Up</button>
        </form>
        <a href="/Spotify clone/login.php" class="login-link">Already have an account? Login here</a>
    </div>
</body>
</html>
