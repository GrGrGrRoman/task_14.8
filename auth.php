<?php

function checkPassword($login, $password)
{
    include 'usersDB.php';

    foreach ($users as $user)    

        if ($user['login'] === $login && md5($user['password']) === md5($password))
        {
        return true;
        }
        
}

function getCurrentUser(): ?string
{
    $loginFromCookie = $_COOKIE['login'] ?? '';
    $passwordFromCookie = $_COOKIE['password'] ?? '';

    if (checkPassword($loginFromCookie, $passwordFromCookie))
    {
        return $loginFromCookie;
    }
    return null;
}
