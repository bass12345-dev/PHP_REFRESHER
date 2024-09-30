<div class="form-container">
    <form action="/PHP_APPLYING/TRADITIONAL/index.php" method="post" id="user_form">
        <?php $id = null; ?>
        <?php if(isset($_GET['id']) && !isset($_GET['type']))
        {
            $id  = $_GET['id'];
            $sql = "SELECT * FROM users WHERE user_id = :user_id";
            $statement = $conn->prepare($sql);
            $statement->execute(['user_id' => $id]);
            $user = $statement->fetch();


            
        
        }
        ?>
        <input type="hidden" name="user_id" value="<?php echo $id != null ? $user->user_id : ''; ?>">
        <div class="row">
            <label>First Name</label>
            <input type="text" name="first_name" value="<?php echo $id != null ? $user->first_name : ''; ?>">
        </div>
        <div class="row">
            <label>Middle Name</label>
            <input type="text" name="middle_name" value="<?php echo $id != null ? $user->middle_name : ''; ?>">
        </div>
        <div class="row">
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?php echo $id != null ? $user->last_name : ''; ?>">
        </div>
        <div class="row">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $id != null ? $user->username : ''; ?>">
        </div>
        <div class="row">
            <label>Gender</label>
            <select name="gender">
                <?php

                 for ($i=0; $i < count($gender); $i++) { 

                    $is_selected = $user->gender == $gender[$i] ? 'selected' : '';
                    echo '<option value="'.$gender[$i].'" '.$is_selected.'>'.ucfirst($gender[$i]).'</option>';
                } ?>
            </select>
        </div>
        <div class="row">
            <label>Status</label>
            <select name="status">
                <?php for ($i=0; $i < count($status); $i++) { 
                    $is_selected = $user->user_status == $status[$i] ? 'selected' : '';
                    echo '<option value="'.$status[$i].'" '.$is_selected.'>'.ucfirst($status[$i]).'</option>';
                } ?>
            </select>
        </div>
        <div class="row">
            <input type="submit" name="submit">
            <?php
                if($id != null){
                    echo '<a href="/PHP_APPLYING/TRADITIONAL/index.php">Cancel Update</a>';
                }
            ?>
        </div>
   
    </form>
</div>