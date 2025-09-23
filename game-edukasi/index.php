<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Game Edukasi Komputer</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #d9fbc9;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        .intro {
            background: #b5e48c;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin: 30px auto;
            width: 300px;
        }

        .menu a {
            padding: 15px;
            background: #d9f99d;
            border-radius: 10px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .menu a:hover {
            background: #a3e635;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>🎮 GAME EDUKASI KOMPUTER</h1>

        <div class="intro">
            <p>Selamat datang di <b>Game Edukasi Komputer</b> 🎉</p>
            <p>Aplikasi ini dirancang untuk membantu Anda belajar komputer dengan cara yang seru.
                Tersedia fitur <b>Ensiklopedia</b>, <b>Kuis</b>, <b>Puzzle</b>, dan <b>Tebak Gambar</b>.</p>
            <p>Silakan pilih menu di atas untuk memulai 🚀</p>
        </div>
        <!-- Menu Navigasi -->
        <div class="menu">
            <!-- Konten Beranda -->
            <a href="ensiklopedia.php">📚 ENSIKLOPEDIA</a>
            <a href="quiz/mulai-kuis.php">❓ KUIS</a>
            <a href="puzzle/puzzle.php">🧩 PUZZLE</a>
            <a href="tebak_gambar/tebak_gambar.php">🖼️ TEBAK GAMBAR</a>
        </div>


    </div>
</body>

</html>