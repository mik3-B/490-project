<?php
include('db.php');
$result = array();
if($_POST ){
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(array($_POST['email']));
    if($stmt->fetchColumn()){
        $result = array(
            'status'=>'error',
            'msg'=>'Email Id Already Registered With Us'
        );
    }
    else{
        $stmt = null;
        $stmt = $db->prepare("INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)");       
        $data = array(              
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
        );
        $stmt->execute($data);
        $result = array(
            'status'=>'success',
            'msg'=>'Registration Successfull'
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