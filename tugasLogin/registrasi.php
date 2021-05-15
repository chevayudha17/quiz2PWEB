<?php 
require 'konek.php';

if(isset($_POST["register"])){
    if( registrasi($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan!');
            </script>";
            
            header("Location: index.php");
            exit;
    } else {
        echo mysqli_error($conn);
    }
    
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    
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
    height: 70%;
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
    </style>
</head>
<body>
    <h1>Registrasi</h1>
    <form class="container" action="" method="post">

    
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        
            <label for="password2">Konfirmasi Password</label>
            <input type="password" name="password2" id="password2">

            <label for="submit">
            <button type="submit" name="register">Daftar</button>
            </label>
        
    </form>
</body>
</html>