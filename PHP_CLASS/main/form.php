<div class="form-container">
    <form id="user_form">

        <input type="hidden" name="user_id" value="">
        <div class="row">
            <label>First Name</label>
            <input type="text" name="first_name" value="">
        </div>
        <div class="row">
            <label>Middle Name</label>
            <input type="text" name="middle_name" value="">
        </div>
        <div class="row">
            <label>Last Name</label>
            <input type="text" name="last_name" value="">
        </div>
        <div class="row">
            <label>Username</label>
            <input type="text" name="username" value="">
        </div>
        <div class="row">
            <label>Gender</label>
            <select name="gender">
                <?php

                for ($i = 0; $i < count($gender); $i++) {
                    echo '<option value="' . $gender[$i] . '" >' . ucfirst($gender[$i]) . '</option>';
                } ?>
            </select>
        </div>
        <div class="row">
            <label>Status</label>
            <select name="status">
                <?php for ($i = 0; $i < count($status); $i++) {

                    echo '<option value="' . $status[$i] . '" >' . ucfirst($status[$i]) . '</option>';
                } ?>
            </select>
        </div>
        <div class="row">
            <button type="submit">Submit</button>

        </div>

    </form>
</div>