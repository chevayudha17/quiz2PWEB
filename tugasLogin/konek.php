<?php 
$conn = mysqli_connect("localhost","root","","register");

// $query = mysqli_query($koneksiDatabase,"SELECT * FROM users ");

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

#cek username sudah ada atau belum
$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' ");

if(mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('username sudah terdaftar!');
        </script>";
    return false;
}

#cek konfirmasi pw
if ($password !== $password2) {
    echo "<script>
        alert('password tidak sesuai!');
    </script>";
    return false;
    }
$password =  password_hash($password, PASSWORD_DEFAULT);

mysqli_query($conn,"INSERT INTO  users VALUES('', '$username', '$password') ");

return mysqli_affected_rows($conn);

}
 ?>