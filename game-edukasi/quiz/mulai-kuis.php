<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulai Kuis</title>
    <link rel="stylesheet" href="kuis.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- <style>
        body {
            /* Tambahkan 4 baris ini */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;

            /* Baris di bawah ini mungkin sudah ada, pastikan saja ada */
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* --- Halaman Awal Kuis (Pilihan Kategori) --- */
        .start-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 800px;
            padding: 40px;
            box-sizing: border-box;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        .start-container h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #333;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .start-container p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 40px;
        }

        /* --- Grid untuk Kartu Kategori --- */
        .category-grid {
            display: grid;
            /* Membuat grid responsif: 2 kolom di layar besar, 1 kolom di layar kecil */
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .category-card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #333;
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: #764ba2;
        }

        .category-card .emoji {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .category-card h3 {
            margin: 0 0 5px 0;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .category-card p {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
        }

        /* --- Style Khusus untuk Kartu "Semua Kategori" --- */
        .all-category {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .all-category h3 {
            color: white;
        }

        .all-category p {
            color: rgba(255, 255, 255, 0.8);
        }
    </style> -->
</head>

<body>
    <div class="start-container center">
        <h1>Selamat Datang di Kuis Komputer!</h1>
        <p>Pilih kategori soal yang ingin kamu kerjakan di bawah ini.</p>

        <div class="category-grid">
            <a href="kuis.php?kategori=Perangkat Keras" class="category-card">
                <span class="emoji">⚙️</span>
                <h3>Perangkat Keras</h3>
                <p>Uji pengetahuanmu tentang CPU, RAM, dsb.</p>
            </a>
            <a href="kuis.php?kategori=Software" class="category-card">
                <span class="emoji">💻</span>
                <h3>Software</h3>
                <p>Soal seputar Sistem Operasi dan Aplikasi.</p>
            </a>
            <a href="kuis.php?kategori=Internet" class="category-card">
                <span class="emoji">🌐</span>
                <h3>Internet & Jaringan</h3>
                <p>Seberapa tahu kamu tentang dunia online?</p>
            </a>
            <a href="kuis.php?kategori=Semua" class="category-card all-category">
                <h3>Acak Semua Soal</h3>
                <p>Tantang dirimu dengan semua soal yang ada!</p>
            </a>
        </div>
    </div>
</body>

</html>