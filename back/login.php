<?php
include('db.php');
$result = array();
if($_POST ){
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->execute(array($_POST['email'],$_POST['password']));
    if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result = array(
            'status'=>'success',
            'msg'=>'Login Successfull',
            'data'=>$data
        );
    }
    else{
        $result = array(
            'status'=>'error',
            'msg'=>'Invalid Login Details'
        );
    }
}
else{
    $result = array(
        'status'=>'error',
        'msg'=>'Method Not Allowed'
    );
}
print json_encode($result);

?>