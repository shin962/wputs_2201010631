<?php

include_once('konfigurasi.php');
if(isset($_POST["tambah"])){
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jurusan = $_POST["jurusan"];
    $tlp = $_POST["tlp"];

    $sql = "INSERT INTO tbmhs(nim, nama, alamat, jurusan, no_tlp) VALUES ('$nim','$nama','$alamat','$jurusan','$tlp')";
    $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Connection to dbmhs Failed");
    $return = mysqli_query($cnn, $sql);
    if($return){
        echo("
        <script>
            alert('Data Berhasil Ditambahkan!')
        </script>");
    }else{
        echo("
        <script>
            alert('Data Gagal Ditambahkan!')
        </script>");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <form action="tambah_mahasiswa.php" method="POST">
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <td><label for="nim">NIM</label></td>
                <td><input type="number" name="nim"></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" name="alamat"></td>
            </tr>          
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td>
                    <select name="jurusan">
                        <option value="MTI">MTI</option>
                        <option value="KAB">KAB</option>
                        <option value="DKV">DKV</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tlp">No Telepon</label></td>
                <td><input type="number" name="tlp"></td>
            </tr>
        </table><br>
            <div>
                <td><button type="submit" name="tambah">Tambah</button></td>
                <button><a href="dashboard.php">Kembali</a></button>
            </div>
    </form>
</body>
</html>
