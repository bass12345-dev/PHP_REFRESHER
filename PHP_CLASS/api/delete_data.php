<?php

include_once('../connection/connection.php');
include_once('../CLASS/UserClass.php');


$conn = new Connection();
$db = $conn->db();
$user = new User($db,null,null,null);
$request_body = file_get_contents('php://input');
$data = json_decode($request_body);

$user->user_id = htmlspecialchars(strip_tags($data->user_id));

if ($user->DeleteUser()) {
    $data = array('message' => 'Deleted Successfully','response' => true);
} else {
    $data = array('message' => 'Error','response' => false);
}

echo json_encode($data);


?>