<?php
session_start();

// Ambil skor akhir dari session
$skor_akhir = isset($_SESSION['skor']) ? $_SESSION['skor'] : 0;

// Pesan berdasarkan skor
if ($skor_akhir >= 80) {
    $pesan = "Luar Biasa! 🏆";
    $emoji = "🥳";
} elseif ($skor_akhir >= 60) {
    $pesan = "Bagus, Tingkatkan Lagi! 👍";
    $emoji = "😊";
} else {
    $pesan = "Jangan Menyerah, Coba Lagi! 💪";
    $emoji = "🤔";
}

// Hapus semua data session kuis
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis</title>
    <link rel="stylesheet" href="kuis.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="result-container">
        <div class="result-emoji"><?= $emoji ?></div>
        <h2 class="result-title">Kuis Selesai!</h2>
        <p class="result-message"><?= $pesan ?></p>
        <div class="final-score-container">
            <p>Skor Akhir Anda</p>
            <div class="final-score"><?= $skor_akhir ?></div>
        </div>
        <div class="action-buttons">
            <a href="kuis.php" class="btn-primary">Ulangi Kuis</a>
            <a href="../index.php" class="btn-secondary">Kembali ke Beranda</a>
        </div>
    </div>
</body>

</html>