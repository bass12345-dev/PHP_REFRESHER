
<?php 
require('../connection/connection.php');

$query          = 'SELECT * FROM users';
$statement      = $conn->prepare($query);
$statement->execute();
$res = $statement->fetchAll();

echo json_encode($res);

?>

