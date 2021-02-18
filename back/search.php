<?php
include('db.php');
$result = array();
if($_POST ){
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute(array($_POST['user_id']));

    if($stmt->fetch()){

        $stmt = $db->prepare("SELECT name,id FROM users WHERE id != ? AND (name LIKE ? OR email LIKE ?)");
        $stmt->execute(array($_POST['user_id'],'%'.$_POST['s'].'%','%'.$_POST['s'].'%'));
        if($res = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            $result = array(
                'status'=>'success',
                'msg'=>'Users List',
                'data'=>$res
            );
        }
        else{
            $result = array(
                'status'=>'success',
                'msg'=>'No Users Found',
                'data'=>null
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