<?php
include('../config.php');

session_start();
//Checking user logged in or not
if($_SESSION['user_id'] == '' || $_SESSION['user_name'] == ''){
    header('location:logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Search</title>
</head>
<body>
    <ul>
    <li>
        <a class="active" href="search.php">Search</a>
    </li>
    <li style="float:right">
        <a href="logout.php">Logout</a>
    </li>
    <li style="float:right">
        <a href="javascript:(0)">Hi <?php echo $_SESSION['user_name']; ?></a>
    </li>
    </ul>
    <div class="wrap">
    <div class="search">
        <input type="text" class="searchTerm" id="searchTerm" onkeyup="return Search();" placeholder="Enter User's Name or Email Id">
        <button type="button" onClick="return Search();" class="searchButton">
            <i class="fa fa-search"></i>
        </button>
        <br>
        <div id="livesearch">
            
        </div>
    </div>
    </div>

<script>const BASE_URL = "<?php echo BASE_URL; ?>"; </script>
<script src="functions.js"></script>
<script src="app.js"></script>
</body>
</html>