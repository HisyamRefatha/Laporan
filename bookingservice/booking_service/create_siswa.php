<?php

if(isset($_POST['save']))
{
    include 'connection.php';
    $nisn = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $jurusan = $_POST['jurusan'];
    $foto = $_POST['foto'];

    $query = "INSERT INTO datasiswa SET nisn='$nisn', nama_lengkap='$nama_lengkap', asal_sekolah='$asal_sekolah', jurusan='$jurusan', foto='$foto'";

    $create = mysqli_query($db_connection, $query);

    if ($create) {
        echo '<p>mobil added successfully ! </p>';
    } else {
        echo '<p>mobil add failed ! </p>';
    }
}
?>