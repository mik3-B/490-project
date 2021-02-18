<?php
include('../config.php');

session_start();
//Checking user logged in or not
if($_SESSION['user_id'] == '' || $_SESSION['user_name'] == ''){
    header('location:logout.php');
}
else{
  $id = $_GET['id'];
  if($id != ''){
    

  }
  else{
    header('location:search.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Profile</title>
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

    <div class="wrapper">
  <div class="profiles-wrapper">
    <div class="picture">
      <img class="img rounded-img" src="user.png">
      <h3 class="name" id="name"><?php echo $results->data->name; ?></h3>
      <div class="email" id="email"><?php echo $results->data->email; ?></div>
    </div>

  </div>

  <div class="right-wrapper"  style="width:100%;">

    <div class="users-list-wrapper">
      <h2>Comments</h2>
      <div id="comment_section"></div>

    </div>
    
    <!-- users list wrapper -->

    <div class="articles-list-wrapper">
      <h2>Comment here</h2>

      <div class="articles-list">
        <div class="login" style="margin-top: 0 !important;">
            <form method="post" action="javascript:void(0)" onSubmit="return addComment()">
                <p>
                    <label for="comments">Enter your Comments</label>
                    <textarea name="comments" required id="comments" rows="4" placeholder="Enter Comments"></textarea>
                </p>
                <p class="submit"><input type="submit" id="post" name="commit" value="Post"></p>
            </form>
            </div>
      </div>

    </div>
    <!-- articles list wrapper -->

  </div>

</div>

</div>
<!-- wrapper -->
<script>const BASE_URL = "<?php echo BASE_URL; ?>"; const USER_ID = "<?php echo $id ?>"; </script>
<script src="functions.js"></script>
<script src="app.js"></script>
<script>
  Profile();
  getComments();
</script>
</body>
</html>