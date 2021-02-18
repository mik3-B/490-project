<?php
session_start();
$result = array();
if($_SESSION['user_id'] == '' || $_SESSION['user_name'] == ''){
    $result = array(
        'status'=>'error',
        'msg'=>'Not Logged In'
    );
}
else{
    $s = $_GET['s'];
    $url = $_GET['BASE_URL']."/back/search.php";
    $data = array(
        's'=>$s,
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
    //print json_encode(json_decode($response));
    $results = json_decode($response);
    if($results->status == 'success'){
        $result = array(
            'status'=>'success',
            'msg'=>'Here\'s your result',
            'data'=>$results->data
        );
    }
    else{
        $result = array(
            'status'=>'error',
            'msg'=>'Your\'e not logged in'
        );
    }
}

print json_encode($result);

?>