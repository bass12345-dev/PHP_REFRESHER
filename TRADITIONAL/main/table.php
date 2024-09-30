<div class="table">
    ,
    <table style="width: 100%;">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>UserName</th>
                <th>Gender</th>
                <th>User Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $row) : ?>
            <tr>
                <td><?php echo $row->first_name.' '. $row->middle_name.' '.  $row->last_name ?></td>
                <td><?php echo $row->username ?></td>
                <td><?php echo $row->gender ?></td>
                <td><?php echo $row->user_status ?></td>
                <td><a href="/PHP_APPLYING/TRADITIONAL/index.php?id=<?php echo $row->user_id ?>&&type=delete">delete</a>
                    <a href="/PHP_APPLYING/TRADITIONAL/index.php?id=<?php echo $row->user_id ?>">update</a></td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>