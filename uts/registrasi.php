<?php
include_once("konfigurasi.php");
  $msg = "";
  if(isset($_POST["txNAMA"])){
    $pass1 = $_POST["txPASS1"];
    $pass2 = $_POST["txPASS2"];
    if($pass1==$pass2){
      $nama = $_POST["txNAMA"];
      $email = $_POST["txEMAIL"];
      $user = $_POST["txUSER"];

      $sql = "INSERT INTO tbuser(nama, email, username, passkey, iduser) VALUE('$nama','$email','$user','".md5($pass1)."','".md5($nama)."');";

      $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Connection to dbmhs Failed");
      $hasil = mysqli_query($cnn, $sql);
      if($hasil){
        $msg = "You has registered";
      }else{
        $msg = "Register failed, please try again";
      }
    }else{
      $msg = "Password doesn't match";
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
  </head>
  <body>


  <?php
    if(!$msg==""){
        echo "<div>".$msg."</div>";
    }
?>


    <form action="registrasi.php" method="POST" class="">

    <div>
      Full Name<br>
      <input type="text" name="txNAMA">
    </div>
    <div>
      Email<br>
      <input type="text" name="txEMAIL">
    </div>
    <div>
      Username<br>
      <input type="text" name="txUSER">
    </div>
    <div>
      Password<br>
      <input type="password" name="txPASS1">
    </div>
    <div>
      Confirm Password<br>
      <input type="password" name="txPASS2">
    </div>
    <div><br>
      <button type="submit">Register</button>
    </div>
    </form>
  </body>
</html>
