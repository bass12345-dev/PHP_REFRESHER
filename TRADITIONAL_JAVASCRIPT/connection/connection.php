<?php 

$db_name = 'test_crud';
$host = 'localhost';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db_name";

try {
    $conn = new PDO($dsn,$username,$password);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
} catch (ErrorException $err) {

    echo 'Connection Error';
    
}

    

?>