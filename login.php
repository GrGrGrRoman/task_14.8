<?php
if (!empty($_POST))
{
    include 'auth.php';

    $login = $_POST['login'] ?? '';
    $password = md5($_POST['password']) ?? '';
    $dateOfBirthDay = $_POST['dateOfBirthDay'] ?? '';

    if (checkPassword($login, $password))
    {
        session_start();
        setcookie('timeStart',time(), 0, '/');
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        setcookie('dateOfBirthDay', $dateOfBirthDay, 0, '/');
        header('Location: /lk.php');        
    } else {
        $error = 'Ошибка авторизации';
        header('Location: /authError.html');
    }
}
