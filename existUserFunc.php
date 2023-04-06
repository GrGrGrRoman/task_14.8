<?php
function existUser($login) {
    include 'usersDB.php';
    foreach ($users as $user) {
    if ($user['login'] === $login) {
        return true;
    }
    }
}
var_dump (existUser('mentor'));