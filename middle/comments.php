<?php
session_start();
$result = array();
if($_SESSION['user_id'] == '' || $_SESSION['user_name'] == ''){
    $result = array(
        'status'=>'error',
        'msg'=>'Not Logged In'
    );

print json_encode($result);
}
else{
    $url = $_POST['BASE_URL']."/back/comments.php";
    $data = array(
        'profile_id'=>$_POST['profile_id'],
        'user_id'=>$_SESSION['user_id']
    );

    //Curl initialization with url
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // execute!
    $response = curl_exec($ch);

    // close the connection, release resources used
    curl_close($ch);

    // do anything you want with your response
    print json_encode(json_decode($response));
}


?>