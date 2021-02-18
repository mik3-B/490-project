<?php
include('db.php');
$result = array();
if($_POST ){
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute(array($_POST['user_id']));

    if($stmt->fetch()){

        $stmt = $db->prepare("SELECT * FROM comments WHERE profile_id = ?");
        $stmt->execute(array($_POST['profile_id']));

        if($data = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            $res = array();
            $i = 0;
            foreach($data as $dt){
                $res[$i] = $dt;
                $stmt = $db->prepare("SELECT name FROM users WHERE id = ?");
                $stmt->execute(array($dt['added_by']));
                $get_d = $stmt->fetch(PDO::FETCH_ASSOC);
                $res[$i]['name'] = $get_d['name'];
                $res[$i]['created_at'] = date('d-m-Y',strtotime($dt['created_at']));
                $i++;
            }
            $result = array(
                'status'=>'success',
                'msg'=>'User Profile',
                'data'=>$res
            );
        }
        else{
            $result = array(
                'status'=>'error',
                'msg'=>'No Comments Found'
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