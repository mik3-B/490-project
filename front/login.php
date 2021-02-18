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
    <title>Login</title>
</head>
<body class="login_body">
    <div class="login">
    <h1>Login to Web App</h1>
    <form method="post" action="javascript:void(0)" onSubmit="return Login();">
        <p>
            <label for="email">Enter your email</label>
            <input type="email" name="emails" id="email" value="" placeholder="Enter your email" required autocomplete="new-email">
        </p>
        <p>
            <label for="password">Enter your password</label>
            <input type="password" name="passwords" id="password" value="" placeholder="Password" required autocomplete="new-password">
        </p>
        <p class="submit"><input type="submit" id="login" name="commit" value="Login"></p>
    </form>
    </div>
<div class="login-help">
  <p>Don't have any account? <a href="register.php">Click here to Register</a>.</p>
</div>

<script>const BASE_URL = "<?php echo BASE_URL; ?>"; </script>
<script src="functions.js"></script>
<script src="app.js"></script>
</body>
</html>