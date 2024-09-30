<?php
$gender = array('male', 'female');
$status = array('active', 'inactive');

$sql = "SELECT * FROM users";
$statement = $conn->prepare($sql);
$statement->execute();
$users = $statement->fetchAll();

###ADD UPDATE ACTION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $items = array(
        'first_name' => htmlspecialchars($_POST['first_name']),
        'middle_name' => htmlspecialchars($_POST['middle_name']),
        'last_name' => htmlspecialchars($_POST['last_name']),
        'gender' => htmlspecialchars($_POST['gender']),
        'username' => htmlspecialchars($_POST['username']),
        'user_status' => htmlspecialchars($_POST['status']),
    );

    if ($_POST['user_id'] == NULL) {
        add($conn, $items);
    } else {
        update($conn, $items, $_POST['user_id']);
    }
}


#DELETE ACTION
if(isset($_GET['type']) && isset($_GET['id'])){

    $id = $_GET['id'];
    
    if($_GET['type'] == 'delete'){
        $res = delete($id,$conn);
        if($res){
            echo '<script>
                alert("Deleted Successfully");
                window.location.href = "/PHP_APPLYING/TRADITIONAL/index.php"
            </script>';

            
        }
        
    }else {
        echo '<script>
        alert("Error Request");
        window.history.back();
        </script>';
    }
}   


function update($conn, $items, $id)
{

    $items['user_id'] = $id;
    $query = 'UPDATE users SET 
                            first_name  =:first_name,
                            middle_name =:middle_name,
                            last_name   =:last_name,
                            user_status =:user_status,
                            username    =:username,
                            gender      =:gender 
                WHERE       user_id     =:user_id';

    $statement = $conn->prepare($query);
    $statement->execute($items);
    $res = $statement->rowCount();

    if ($res) {
        echo '<script>
            alert("Updated Successfully");
           window.location.href = "/PHP_APPLYING/TRADITIONAL/index.php"
        </script>';


    } else {
        echo 'ERROR';
    }


}

function delete($id, $conn)
{
    $items = array('user_id' => $id);
    $query = 'DELETE FROM users WHERE user_id = :user_id';
    $statement = $conn->prepare($query);
    $statement->execute($items);
    $res = $statement->rowCount();
    return $res;
}
?>