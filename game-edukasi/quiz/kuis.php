<?php
session_start();
include '../db.php'; // Pastikan file koneksi database Anda benar

// Jumlah soal yang ingin ditampilkan per sesi kuis
$jumlah_soal_per_sesi = 5;

// === LOGIKA MEMULAI KUIS (Hanya dijalankan sekali di awal) ===
if (!isset($_SESSION['quiz_started'])) {
    // 1. Ambil kategori dari URL. Jika tidak ada, anggap "Semua".
    $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'Semua';

    // 2. Simpan kategori di session agar tidak hilang saat pindah soal
    $_SESSION['kategori'] = $kategori;
    $_SESSION['quiz_started'] = true;
    $_SESSION['skor'] = 0;
    $_SESSION['nomor_soal_ke'] = 1;

    // 3. Siapkan query SQL yang dinamis dan aman
    $sql = "SELECT id FROM kuis";
    if ($kategori != 'Semua') {
        $sql .= " WHERE kategori = ?"; // Filter berdasarkan kategori
    }
    $sql .= " ORDER BY RAND() LIMIT ?";

    // 4. Gunakan prepared statement untuk keamanan
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($kategori != 'Semua') {
        // Bind parameter kategori dan jumlah soal
        mysqli_stmt_bind_param($stmt, "si", $kategori, $jumlah_soal_per_sesi);
    } else {
        // Bind parameter jumlah soal saja
        mysqli_stmt_bind_param($stmt, "i", $jumlah_soal_per_sesi);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Ambil semua ID soal yang terpilih dan simpan di session
    $id_soal_array = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $id_soal_array[] = $row['id'];
    }

    // Pengecekan jika kategori yang dipilih tidak memiliki soal
    if (empty($id_soal_array)) {
        session_destroy(); // Hapus session agar bisa mulai lagi
        die("
            <body style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
                <h2>Error: Tidak ada soal untuk kategori '$kategori'!</h2>
                <p>Silakan pilih kategori lain atau isi soal untuk kategori ini terlebih dahulu.</p>
                <a href='index.php' style='text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;'>Kembali ke Beranda</a>
            </body>
        ");
    }

    $_SESSION['id_soal_kuis'] = $id_soal_array;
    $_SESSION['jumlah_soal_total'] = count($id_soal_array); // Simpan jumlah soal total
}

// === LOGIKA CEK JAWABAN (Saat form disubmit) ===
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jawaban'])) {
    $id_soal_sebelumnya = $_POST['id_soal'];
    $jawaban_user = $_POST['jawaban'];

    $query_kunci = mysqli_query($koneksi, "SELECT jawaban FROM kuis WHERE id = $id_soal_sebelumnya");
    $kunci_jawaban = mysqli_fetch_assoc($query_kunci)['jawaban'];

    if ($jawaban_user == $kunci_jawaban) {
        $_SESSION['skor'] += (100 / $_SESSION['jumlah_soal_total']);
    }

    $_SESSION['nomor_soal_ke']++;
}

// Cek apakah kuis sudah selesai
if ($_SESSION['nomor_soal_ke'] > $_SESSION['jumlah_soal_total']) {
    header('Location: hasil.php');
    exit;
}

// Ambil data soal yang sekarang berdasarkan urutan di session
$nomor_sekarang = $_SESSION['nomor_soal_ke'];
$id_soal_sekarang = $_SESSION['id_soal_kuis'][$nomor_sekarang - 1];
$query_soal = mysqli_query($koneksi, "SELECT * FROM kuis WHERE id = $id_soal_sekarang");
$soal = mysqli_fetch_assoc($query_soal);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Interaktif - <?= $_SESSION['kategori'] ?></title>
    <link rel="stylesheet" href="kuis.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="quiz-container">
        <div class="progress-bar-container">
            <div class="progress-bar" style="width: <?= (($nomor_sekarang - 1) / $_SESSION['jumlah_soal_total']) * 100 ?>%;"></div>
        </div>

        <div class="quiz-header">
            <span class="question-counter">Soal <?= $nomor_sekarang ?> dari <?= $_SESSION['jumlah_soal_total'] ?></span>
            <span class="score">Skor: <?= round($_SESSION['skor']) ?></span>
        </div>

        <h2 class="question-text"><?= htmlspecialchars($soal['pertanyaan']) ?></h2>

        <form method="post" action="kuis.php" class="quiz-form">
            <input type="hidden" name="id_soal" value="<?= $id_soal_sekarang ?>">

            <label class="option">
                <input type="radio" name="jawaban" value="A" required>
                <span class="option-letter">A</span>
                <span class="option-text"><?= htmlspecialchars($soal['opsi_a']) ?></span>
            </label>
            <label class="option">
                <input type="radio" name="jawaban" value="B" required>
                <span class="option-letter">B</span>
                <span class="option-text"><?= htmlspecialchars($soal['opsi_b']) ?></span>
            </label>
            <label class="option">
                <input type="radio" name="jawaban" value="C" required>
                <span class="option-letter">C</span>
                <span class="option-text"><?= htmlspecialchars($soal['opsi_c']) ?></span>
            </label>

            <button type="submit" class="submit-btn">Lanjut ➡</button>
        </form>
    </div>
</body>

</html>