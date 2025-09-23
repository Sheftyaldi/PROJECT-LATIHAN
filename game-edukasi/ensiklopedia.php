<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ensiklopedia Komputer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Ensiklopedia Komputer</h2>
    <ul>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM ensiklopedia");
        while($d = mysqli_fetch_array($data)){
            echo "<li><b>".$d['judul']."</b>: ".$d['deskripsi']."</li>";
        }
        ?>
    </ul>
    <a href="index.php">⬅ Kembali</a>
</body>
</html>