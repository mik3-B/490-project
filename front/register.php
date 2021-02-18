<?php
include('../config.php');

session_start();
//If logged in redirect to search page
if($_SESSION['user_id']){
    header('location:search.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body class="login_body">
    <div class="login">
    <h1>Register</h1>
    <form method="post" onSubmit="return Register();" id="register_form" action="javascript:void(0)" enctype="multipart/form-data">
        <p>
            <label for="name">Enter your name</label>
            <input type="text" name="name" value="" placeholder="Enter Your Name" required>
        </p>
        <p>
            <label for="email">Enter your email</label>
            <input type="email" name="email" id="email" value="" placeholder="Enter your email" autocomplete="new-email" required>
        </p>
        <p>
            <label for="password">Enter your password</label>
            <input type="password" name="password" id="password" value="" placeholder="Password" autocomplete="new-password" required>
        </p>
        
        <p class="submit">
            <input type="submit" id="register" name="commit" value="Register">
        </p>
    </form>
    </div>
<div class="login-help">
  <p>Already Registered? <a href="login.php">Click here to Login</a>.</p>
</div>
<script>const BASE_URL = "<?php echo BASE_URL; ?>"; </script>
<script src="functions.js"></script>
<script src="app.js"></script>
</body>
</html>