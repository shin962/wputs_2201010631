<?php
    include("konfigurasi.php");

    $tbname = "tbUSER";
    $sql = "CREATE TABLE $tbname(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Nama varchar(50) NOT NULL,
        email varchar(255) NOT NULL,
        username varchar(20),
        passkey varchar(255),
        iduser varchar(255)
    );";

    $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("koneksi gagal");

     $hasil = mysqli_query($cnn, $sql);
     if($hasil){
        echo "tabel berhasil dibuat";
     }else{
        echo "table gagal dibuat";
     }
     mysqli_close($cnn);