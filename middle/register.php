<?php
if($_POST && isset($_POST['BASE_URL'])){

    //Back url
    $url = $_POST['BASE_URL']."/back/register.php";

    $data = array(
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'password'=>$_POST['password']
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