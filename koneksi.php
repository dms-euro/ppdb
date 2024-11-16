<?php 
    $namahost = "localhost";
    $user = "root";
    $password = "";
    $database = "sekolah";
    $conn = mysqli_connect($namahost,$user,$password,$database);
    if (!$conn) {
        echo "database tidak terhubung";
    }
?>