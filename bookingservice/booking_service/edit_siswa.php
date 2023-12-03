<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>alert ('Please login first !');window.location.replace('form_login_0014.php');</script>";
}
if ($_SESSION['usertype'] != 'admin') {
    echo "<script>alert ('Access Forbiden !');window.location.replace('index.php');</script>";
    header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PT.Onder Jaya</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    <?php include 'css/style.css';
    ?>
    </style>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <!-- header section -->
    <section class="header">
        <a href="home.php" class="logo">PT.Onder Jaya</a>

        <nav class="navbar">
            <a href="home.php">home</a>
            <?php if ($_SESSION['usertype'] == 'admin') { ?>
            <a href="read_mobil.php">report service</a>
            <?php } ?>
            <a href="add_mobil.php">booking service</a>
            <?php if ($_SESSION['usertype'] == 'user') { ?>
            <a href="pending_service.php">pending service</a>
            <?php } ?>
            <a href="logout.php">logout</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <!-- end header section -->



    <?php
    include 'connection.php';
    $query = "SELECT * FROM datasiswa WHERE nisn='$_GET[id]'";
    $siswa = mysqli_query($db_connection, $query);
    $data = mysqli_fetch_assoc($siswa);
    ?>
    <section class="booking">
        <h1 class="heading-title">Form Data Absen Siswa</h1>
        <form method="post" action="update_siswa.php" class="book-form">
            <div class="flex">
                <!-- input starts -->
                <div class="inputBox">
                    <label>Nama Lengkap </label>
                    <input type="text" name="nama_lengkap" value="<?= $data[
                        'nama_lengkat'
                    ] ?>" require>
                </div>

                <div class="inputBox">
                    <label>Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" value="<?= $data[
                        'asal_sekolah'
                    ] ?>" require>
                </div>

                <div class="inputBox">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" value="<?= $data[
                        'jurusan'
                    ] ?>" require>
                </div>
                <div class="inputBox">
                    <label>foto </label>
                    <input type="file" name="foto" value="<?= $data[
                        'foto'
                    ] ?>" require>
                </div>
            </div>
            <!-- end input -->
            <input type="submit" name="save" value="save" class="btn" require>
            <input type="reset" name="reset" value="reset" class="btn" require>
            <input type="hidden" name="nisn" value="<?= $data[
                'nisn'
            ] ?>" require>
            <p><a href="read_mobil.php">CANCEL</a></p>

        </form>
    </section>
</body>

</html>