
<?php 
include_once('../connection/connection.php');
include_once('../CLASS/UserClass.php');
$conn = new Connection();
$db = $conn->db();
$user = new User($db,null,null,null);
echo json_encode($user->QueryUsers());
?>

