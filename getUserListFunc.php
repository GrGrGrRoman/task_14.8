<?php

function getUserList() {
    include 'usersDB.php';
    foreach ($users as $user) {
    $user['login'];
    $user['password'];
    echo $user['login'] . ' - ' . $user['password'] . PHP_EOL;
    }
}

getUserList();