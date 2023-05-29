<?php
include_once('konfigurasi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>#</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT * FROM tbmhs ORDER BY id DESC";
                $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Connection to dbmhs Failed");
                $return = mysqli_query($cnn, $sql);
                $no = 1;
                while($row = mysqli_fetch_array($return)) {
                    $id         = $row['id'];
                    $nim        = $row['nim'];
                    $nama       = $row['nama'];
                    $alamat     = $row['alamat'];
                    $jurusan    = $row['jurusan'];
                    $tlp        = $row['no_tlp'];
            ?>
            <tr>
                <th><?= $no++ ?></th>
                <td><?= $nim ?></td>
                <td><?= $nama ?></td>
                <td><?= $alamat ?></td>
                <td><?= $jurusan ?></td>
                <td><?= $tlp ?></td>
                <td>
                    <a href="edit_mahasiswa.php?id=<?= $id ?>"><button type="submit">Edit</button></a> |
                    <a href="hapus_mahasiswa.php?id=<?= $id ?>"> <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button></a>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table><br>
    <div>
        <button><a href="dashboard.php">Kembali</a></button>
    </div>
</body>
</html>
