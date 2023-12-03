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
            <a href="pending_service.php">history service</a>
            <?php } ?>
            <a href="logout.php">logout</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <!-- end header section -->

    <section>
        <h1 class="heading-title"> report service</h1>
        <div class="container-read">
            <table class="read-table">
                <tr>
                    <th>no</th>
                    <th>Nisn</th>
                    <th>Nama Lengkap</th>
                    <th>Asal Sekolah</th>
                    <th>Jurusan</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                <?php
                include 'connection.php';
                $query = 'SELECT * FROM datasiswa';
                $siswa = mysqli_query($db_connection, $query);

                $i = 1;
                foreach ($siswa as $data): ?>
                <tr>
                    <td data-th="no"><?php echo $i++; ?></td>
                    <td data-th="Nisn"><a href="data_mobil.php?id_mobil=<?= $data[
                        'nisn'
                    ] ?>"><?php echo $data['nisn']; ?></a></td>
                    <td data-th="Nama Lengkap"><?php echo $data[
                        'nama_lengkap'
                    ]; ?></td>
                    <td data-th="Asal Sekolah"><?php echo $data[
                        'asal_sekolah'
                    ]; ?></td>
                    <td data-th="Jurusan"><?php echo $data[
                        'jurusan'
                    ]; ?></td>
                    <td data-th="edit"><a href="edit_siswa.php?id=<?= $data[
                        'nisn'
                    ] ?>">Edit mobil</a></td>
                    <td data-th="delete"><a href="delete_siswa.php?id=<?= $data[
                        'nisn'
                    ] ?>" onclick="return confirm('are you sure?')">delete</a></td>
                </tr>
                <?php endforeach;
                ?>
            </table>
        </div>
    </section>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="js/script.js"></script>
</body>

</html>