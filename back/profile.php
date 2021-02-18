<?php
include('db.php');
$result = array();
if($_POST ){
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute(array($_POST['user_id']));

    if($stmt->fetch()){

        $stmt = $db->prepare("SELECT id,name,email FROM users WHERE id = ?");
        $stmt->execute(array($_POST['id']));

        if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result = array(
                'status'=>'success',
                'msg'=>'User Profile',
                'data'=>$data
            );
        }
        else{
            $result = array(
                'status'=>'error',
                'msg'=>'User Not Found'
            );
        }
    }
    else{
        $result = array(
            'status'=>'error',
            'msg'=>'User Not Logged In'
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