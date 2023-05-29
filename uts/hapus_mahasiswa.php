<?php
include_once('konfigurasi.php');
$id = $_GET['id'];

    $sql = "DELETE FROM tbmhs WHERE id='$id'";
    $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Connection to dbmhs Failed");
    $return = mysqli_query($cnn, $sql);

    header("Location: data_mahasiswa.php");

?>