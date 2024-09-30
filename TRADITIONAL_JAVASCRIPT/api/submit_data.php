<?php
require_once('../connection/connection.php');
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$items = array(
    'first_name' => htmlspecialchars($data['first_name']),
    'middle_name' => htmlspecialchars($data['middle_name']),
    'last_name' => htmlspecialchars($data['last_name']),
    'gender' => htmlspecialchars($data['gender']),
    'username' => htmlspecialchars($data['username']),
    'user_status' => htmlspecialchars($data['user_status']),
);
$message = '';

if(empty($data['user_id'])){
    $query = 'INSERT INTO users(first_name,middle_name,last_name,gender,user_status,username) VALUES(:first_name,:middle_name,:last_name,:gender,:user_status,:username)';
    $message = 'Added Successfully';
}else {
    $items['user_id'] = $data['user_id'];
    $query = 'UPDATE users SET 
                            first_name  =:first_name,
                            middle_name =:middle_name,
                            last_name   =:last_name,
                            user_status =:user_status,
                            username    =:username,
                            gender      =:gender 
                WHERE       user_id     =:user_id';
    $message = 'Updated Successfully';

}


$statement = $conn->prepare($query);
$statement->execute($items);

$res = $statement->rowCount();
$data = [];
if ($res) {

    $data = array(
        'message' => $message.' Successfully',
        'response' => true
    );

} else {

    $data = array(
        'message' => 'Error',
        'response' => false
    );

}

echo json_encode($data);

?>