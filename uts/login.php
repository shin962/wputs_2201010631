<?php
include_once("konfigurasi.php");
    session_start();
    $msg = "";
    if(isset($_POST["txUSER"])){
        $user = $_POST["txUSER"];
        $pass = $_POST["txPASS"];

        $sql = "SELECT tu.nama, tu.email, tu.username, tu.passkey, tu.iduser FROM tbuser tu WHERE tu.username='".$user."';";
        $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Connection to dbmhs Failed");
        $hasil = mysqli_query($cnn, $sql);
        $jdata = mysqli_num_rows($hasil);
        if($jdata > 0){
            $h = mysqli_fetch_assoc($hasil);
            $_SESSION["login"] = $h['iduser'];
            $_SESSION["user"] = $h['username'];
            header("location: dashboard.php");

            if(md5($pass) == $h["passkey"]){

            }else{
                $msg = "Login Failed";  
            }
        }else{
            $msg = "Login Failed";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <h3>Login</h3>
        <input type="text" name="txUSER" placeholder="Username"><br>
        <input type="password" name="txPASS" placeholder="Password"><br>
        <button type="submit">
            Login
        </button>
    </form>
</body>
</html>