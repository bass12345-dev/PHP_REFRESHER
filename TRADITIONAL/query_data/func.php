<?php



function add($conn, $items)
{


    $query = 'INSERT INTO users(first_name,middle_name,last_name,gender,user_status,username) 
                VALUES(:first_name,:middle_name,:last_name,:gender,:user_status,:username)';
    $statement = $conn->prepare($query);
    $statement->execute($items);

    $res = $statement->rowCount();
    if ($res) {
        echo '<script>
            alert("Added Successfully");
           window.location.href = "/PHP_APPLYING/TRADITIONAL/index.php"
        </script>';


    } else {
        echo 'ERROR';
    }
}


?>