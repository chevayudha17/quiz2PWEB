<?php
session_start();
require 'konek.php';

#cek
if( isset($_COOKIE['id']) && isset($_COOKIE['user'])){
    $id = $_COOKIE['id'];
    $user = $_COOKIE['user'];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    #cek username
    if( $user === hash('whirlpool', $row['username'])){
        $_SESSION['login'] = true; 
    }

}

if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}



if (isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    

#cek username
if(mysqli_num_rows($result) === 1){

    #cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row ["password"])){

        $_SESSION["login"] = true;
        
        #add cookie
        if ( isset($_POST['remember'])){
            #COOKIE
            setcookie('id', $row['id'], time()+ 3600);
            setcookie('user', hash('whirlpool', $row['username']));
        }
        header("Location: index.php");
        exit;
    }
}  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

<style>
label{
    display: block;
}
input{
  width: 20px%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  text-align: center;
  border: 4px solid black;
  border-radius: 10px;
}
form { 
margin: 40px auto; 
width:250px;
}
h1 { 
margin: 0 auto; 
width:90px;
background-color: yellow;
height: 20%;
width: 50%;
padding: 30px;
text-align: center;
border: 4px solid black;
border-radius: 10px;
}


.container {
    font-size: 27px;
    text-align: center;
    background-color:green ;
    padding: 30px;
    width: 50%;
    height: 45%;
    border: 4px solid black;
    border-radius: 10px;

}
button{
    font-size: 20px;
    background-color: black;
    color: white;
    border: 3px solid black;
    border-radius: 8px;
    text-align: center;
    height:40px;
    width: 150px;
    transition-duration: 0.4s;
}
button:hover{
    background-color: red;

}
a:hover{
    transition-duration: 0.4s;
    color: red;
}
</style>

</head>
<body>
<h1>Login</h1> 
<form class= "container" action="" method="post">

    
            <label for="username">Username </label>
            <input type="text" name="username" id="username">
        
            <label for="password">Password </label>
            <input type="password" name="password" id="password">
        
            
            <label for="remember">remember me
            <input type="checkbox" name="remember" id="remember">
            </label>
            
            <label for="login">
            <button type="submit" name="login">Login</button>
            </label>

        
            <h5>Belum punya akun?
            <a href="registrasi.php">daftar</a>
            </h5>
</body>
</html>