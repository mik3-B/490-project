<?php
include('db.php');
$result = array();
if($_POST ){
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute(array($_POST['user_id']));
    if($stmt->fetch()){
        $stmt = $db->prepare("INSERT INTO comments (profile_id,added_by,comments,created_at) VALUES(:profile_id,:added_by,:comments,:created_at)");
        $stmt->execute(array(
            ':profile_id'=>$_POST['profile_id'],
            ':added_by'=>$_POST['user_id'],
            ':comments'=>$_POST['comment'],
            ':created_at'=>date('d-m-Y H:i:s')
        ));
        $result = array(
            'status'=>'success',
            'msg'=>'Comment Posted'
        );
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
