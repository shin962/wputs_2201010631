<?php

include_once('konfigurasi.php');
if(isset($_POST["edit"])){
    $id = $_POST['id'];
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jurusan = $_POST["jurusan"];
    $tlp = $_POST["tlp"];

    $sql = "UPDATE tbmhs SET nim='$nim',nama='$nama',alamat='$alamat',jurusan='$jurusan',no_tlp='$tlp' WHERE id='$id';";
    $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Connection to dbmhs Failed");
    $return = mysqli_query($cnn, $sql);
    if($return){
        echo "
        <script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'data_mahasiswa.php';
        </script>";
    }else{
        echo "
        <script>
            alert('Data Gagal Diubah!')
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>

<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbmhs WHERE id='$id'";
        $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Connection to dbmhs Failed");
        $return = mysqli_query($cnn, $sql);

        if(mysqli_num_rows($return) > 0) {
            $row = mysqli_fetch_array($return);
        }
    }
?>

    <form action="edit_mahasiswa.php" method="POST">
        <table>
            <tr>
                <td><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td><input type="number" name="nim" value="<?= $row['nim'] ?>"></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" value="<?= $row['nama'] ?>"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" name="alamat" value="<?= $row['alamat'] ?>"></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td>
                    <select name="jurusan">
                        <option value="MTI" value="<?php if($row['jurusan'] == 'MTI') { echo 'selected'; } ?>">MTI</option>
                        <option value="KAB" value="<?php if($row['jurusan'] == 'KAB') { echo 'selected'; } ?>">KAB</option>
                        <option value="DKV" value="<?php if($row['jurusan'] == 'DKV') { echo 'selected'; } ?>">DKV</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tlp">No Telepon</label></td>
                <td><input type="number" name="tlp" value="<?= $row['no_tlp'] ?>"></td>
            </tr>
        </table>
            <div>
                <button type="submit" name="edit">Edit</button>
            </div>
    </form>
</body>
</html>
