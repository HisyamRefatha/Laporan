<?php

if (isset($_POST['save'])) {
    include 'connection.php';

    $query = "UPDATE datasiswa SET
              nama_lengkap = '$_POST[nama_lengkap]',
              asal_sekolah = '$_POST[asal_sekolah]',
              jurusan = '$_POST[jurusan]',
              foto = '$_POST[foto]',
              WHERE nisn = '$_POST[nisn]';
              ";

    $update = mysqli_query($db_connection, $query);

    if ($update) {
        echo '<p>student update successfully ! </p>';
    } else {
        echo '<p>student update failed ! </p>';
    }
} ?>
<p><a href="read_mobil.php">BACK TO mobil LIST</a></p>