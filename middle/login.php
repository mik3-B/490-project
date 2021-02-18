<?php
session_start();
if($_POST && isset($_POST['BASE_URL'])){

    //Back url
    $url = $_POST['BASE_URL']."/back/login.php";

    $data = array(
        'email'=>$_POST['emails'],
        'password'=>$_POST['passwords']
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
    //print json_encode(json_decode($response));
    $result = json_decode($response);
    if($result->status == 'success'){
        //setting session for login
        $_SESSION['user_id'] = $result->data->id;
        $_SESSION['user_name'] = $result->data->name;
        unset($result->data);
        print json_encode($result);
    }
    else{
        print json_encode(json_decode($response));
    }
}
?>