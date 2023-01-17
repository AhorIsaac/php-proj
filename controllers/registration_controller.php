<?php
session_start();
require_once('../includes/connection.php');

function passwordMatch($pass1, $pass2)
{
    if($pass1 === $pass2)
    {
        return TRUE;
    }
    else
    {
        $_SESSION['pass_error']=TRUE;
        header('location: ../index.php');
        exit();
    }
}


function accountAlreadyExist($email)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE `email` = '$email' ";
    $stmt = $conn->query($sql);
    if($stmt->num_rows > 0){
        $_SESSION['acc_error']=TRUE;
        header('location: ../index.php');
        exit();
    }else{
        return TRUE;
    }
}


function checkIfEmpty($input){
    if(empty($input)){
        $_SESSION['input_error'] = TRUE;
        header('location:../index.php');
        exit();
    }
}


function registerUser($username, $email, $password, $pic){
    global $conn;
    $sql = "INSERT INTO users (`name`, `email`, `password`, `image`)VALUES('$username', '$email', '$password', '$pic') ";
    $register = $conn->query($sql);
    if($register){
        $_SESSION['reg_success'] = TRUE;
        header('location: ../login.php');
        exit();
    }
}

if(isset($_POST['register']))
{
 $username = $_POST['username'];
 $password1 = $_POST['password1'];
 $password2 = $_POST['password2'];
 $email = $_POST['email'];

 $pic = time(). '_'. $_FILES['image']['name'];

 //var_dump($pic); exit();

 checkIfEmpty($username);
 checkIfEmpty($password1);
 checkIfEmpty($password2);
 checkIfEmpty($email);

 passwordMatch($password1, $password2);
 accountAlreadyExist($email);

 $target_dir = "../storage/";
 $target_file = $target_dir . basename($_FILES['image']['name']);
 $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

 // var_dump($imgFileType); exit();

 $extns = array('jpg', 'jpeg', 'png', 'gif');

if(in_array($imgFileType, $extns)){
    move_uploaded_file($_FILES['image']['tmp_name'], $target_dir.$pic);
    $password = md5($password1);
    registerUser($username, $email, $password, $pic);
}else{
    $_SESSION['img_error'] = TRUE;
    header('location: ../index.php');
    exit();
}
 
}

?>