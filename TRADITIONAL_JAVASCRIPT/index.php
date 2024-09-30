<?php

require('connection/connection.php');
$gender = array('male', 'female');
$status = array('active', 'inactive');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    <div class="main">
        <?php include('includes/header.php') ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col1">
                        <?php include('main/table.php') ?>
                    </div>
                    <div class="col2">
                        <?php include('main/form.php') ?>
                    </div>
                </div>
            </div>
        </div>
</body>

<script>

    document.addEventListener("DOMContentLoaded", (event) => {
        load_data();
    });

    const load_data = () => {
        const table = document.getElementsByTagName('tbody')[0];

        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/PHP_APPLYING/TRADITIONAL_JAVASCRIPT/api/table_api.php');
        xhr.send();
        xhr.responseType = 'json';
        xhr.onload = () => {
            if (xhr.status == 200) {
                data = xhr.response;


                data.forEach(element => {

                    var tr = document.createElement('tr');
                    tr.innerHTML += '<td>' + element.first_name + '</td>';
                    tr.innerHTML += '<td>' + element.username + '</td>';
                    tr.innerHTML += '<td>' + element.gender + '</td>';
                    tr.innerHTML += '<td>' + element.user_status + '</td>';
                    tr.innerHTML += '<td><a href="javascript:;" class="delete" data-id="' + element.user_id + '">Delete </a><a href="javascript:;" class="update" \
                                                                                                                    data-id="' + element.user_id + '"\
                                                                                                                    data-first-name="' + element.first_name + '"\
                                                                                                                    data-middle-name="' + element.middle_name + '"\
                                                                                                                    data-last-name="' + element.last_name + '"\
                                                                                                                    data-username="' + element.username + '"\
                                                                                                                    data-gender="' + element.gender + '"\
                                                                                                                    data-status="' + element.user_status + '"\
                                                                                                                    > Update</a></td>';

                    table.appendChild(tr);
                });

            }
        }

    }

    document.getElementById('user_form').addEventListener('submit', function (e) {
        e.preventDefault();

        const body = {
            user_id : document.getElementsByName('user_id')[0].value,
            first_name: document.getElementsByName('first_name')[0].value,
            middle_name: document.getElementsByName('middle_name')[0].value,
            last_name: document.getElementsByName('last_name')[0].value,
            username: document.getElementsByName('username')[0].value,
            gender: document.getElementsByName('gender')[0].value,
            user_status: document.getElementsByName('status')[0].value
        }

        xhr = new XMLHttpRequest();
        xhr.open('POST', '/PHP_APPLYING/TRADITIONAL_JAVASCRIPT/api/submit_data.php', true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.responseType = 'json';
        xhr.onload = () => {
            if (xhr.status == 200) {
                document.getElementsByTagName('tbody')[0].innerHTML = '';
                alert(xhr.response.message);
                load_data();
                this.reset();

            }
        }

        xhr.send(JSON.stringify(body));

    });

    document.addEventListener('click', function (e) {

        if (e.target.classList.contains('delete')) {
            const body = {
                user_id: e.target.getAttribute('data-id')
            }
            xhr = new XMLHttpRequest();
            xhr.open('POST', '/PHP_APPLYING/TRADITIONAL_JAVASCRIPT/api/delete_data.php');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.responseType = 'json';
            xhr.onload = () => {
                if (xhr.status == 200) {

                    document.getElementsByTagName('tbody')[0].innerHTML = '';
                    alert(xhr.response.message);
                    load_data();

                }
            }

            xhr.send(JSON.stringify(body));

        }

        if (e.target.classList.contains('update')) {

            document.getElementsByName('first_name')[0].value = e.target.getAttribute('data-first-name');
            document.getElementsByName('middle_name')[0].value = e.target.getAttribute('data-middle-name');
            document.getElementsByName('last_name')[0].value = e.target.getAttribute('data-last-name');
            document.getElementsByName('username')[0].value = e.target.getAttribute('data-username');
            document.getElementsByName('gender')[0].value = e.target.getAttribute('data-gender');
            document.getElementsByName('status')[0].value = e.target.getAttribute('data-status');
            document.getElementsByName('user_id')[0].value = e.target.getAttribute('data-id');


        }
    });


</script>

</html>