<?php
include_once('../connection/connection.php');
include_once('../CLASS/UserClass.php');



    $conn = new Connection();
    $db = $conn->db();
    $user = new User($db, null, null, null);

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body);

    $user->first_name = htmlspecialchars(strip_tags($data->first_name));
    $user->middle_name = htmlspecialchars(strip_tags($data->middle_name));
    $user->last_name = htmlspecialchars(strip_tags($data->last_name));
    $user->gender = htmlspecialchars(strip_tags($data->gender));
    $user->username = htmlspecialchars(strip_tags($data->username));
    $user->user_status = htmlspecialchars(strip_tags($data->user_status));
    $user->user_id = htmlspecialchars(strip_tags($data->user_id));
    $data = [];
    $message = null;

    if (empty($user->user_id)) {

        if ($user->InsertData()) {
            $data = array('message' => $message . ' Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Error', 'response' => false);
        }

    } else {

        if ($user->UpdateData()) {
            $data = array('message' => $message . ' Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Error', 'response' => false);
        }


    }


    echo json_encode($data);






?>