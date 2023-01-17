<?php
session_start();
require_once('../includes/connection.php');


function rememberMe($rem, $email, $password)
{
    if(! empty($rem) )
    {
        setcookie('userEmail', $email, time() + (1 * 365 * 24 * 60 * 60));
        setcookie('userPassword', $password, time() + (1 * 365 * 24 * 60 * 60));
    }
    else 
    {
        if(isset($_COOKIE["userEmail"]))
        {
            setcookie('userEmail', '');
        }
        if(isset($_COOKIE["userPassword"]))
        {
            setcookie('userPassword', '');
        }
    }
}


function checkIfEmpty($input){
    if(empty($input)){
        $_SESSION['input_error'] = TRUE;
        header('location: ../login.php');
        exit();
    }
}

function validUser($email){
    global $conn;
    $sql = "SELECT * FROM users WHERE `email` = '$email' ";
    $valid = $conn->query($sql);
    if($valid->num_rows > 0){
        return TRUE;
    }else{
        $_SESSION['invalid_user'] = TRUE;
        header('location: ../login.php');
        exit();
    }
}

function loginUser($email, $passwordEncrypt)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$passwordEncrypt' ";
    $user = $conn->query($sql);

    if($user->num_rows > 0)
    {
        $userDetails = $user->fetch_assoc();
        $_SESSION["userid"] = $userDetails["id"];
        $_SESSION["username"] = $userDetails['name'];
        $_SESSION["email"] = $userDetails["email"];
        $_SESSION["image"] = $userDetails["image"]; 

        $_SESSION["login_success"] = TRUE;
        header("location: ../welcome.php");
        exit();
    }
    else 
    {
        $_SESSION["wrong_password"] = TRUE;
        header("location: ../login.php");
        exit();
    }



}


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password1'];
    $rem = $_POST['remember_me'];
    $passwordEncrypt = md5($password);

    // var_dump($rem); exit();
    rememberMe($rem, $email, $password);

    checkIfEmpty($email);
    checkIfEmpty($password);
    validUser($email);
    loginUser($email, $passwordEncrypt);
}


?>