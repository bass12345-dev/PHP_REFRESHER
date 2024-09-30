<?php
require_once('../connection/connection.php');

$data = file_get_contents('php://input');

$row = json_decode($data);


$query = 'DELETE FROM users WHERE user_id = :user_id';
$stmt = $conn->prepare($query);
$stmt->execute(['user_id'=> $row->user_id]);
$res = $stmt->rowCount();
$data = [];
if ($res) {

    $data = array(
        'message' => 'Deleted Successfully',
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