<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Game Mencocokkan Gambar</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            padding: 20px;
            box-sizing: border-box;
        }

        .start-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 700px;
            padding: 30px 40px;
            box-sizing: border-box;
            animation: fadeIn 0.5s ease-in-out;
        }


        /* === HALAMAN GAME MENCOCOKKAN GAMBAR (KONSISTEN) === */

        #game-board {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 420px;
            margin: 30px auto 40px auto;
            /* Memberi jarak atas dan bawah */
            perspective: 1200px;
        }

        .card {
            width: 120px;
            height: 120px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s cubic-bezier(0.6, 0.04, 0.98, 0.34);
            cursor: pointer;
        }

        .card.flipped {
            transform: rotateY(180deg);
        }

        .card-face {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:not(.flipped):hover {
            transform: translateY(-5px);
        }

        .card:not(.flipped):hover .card-face {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .card-front {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .card-front .icon {
            width: 50px;
            height: 50px;
            opacity: 0.8;
        }

        .card-back {
            background-color: #fff;
            transform: rotateY(180deg);
            padding: 8px;
            box-sizing: border-box;
        }

        .card-back img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
        }

        .card.matched {
            transform: rotateY(180deg) scale(1);
            /* Dibuat tidak mengecil agar rapi */
            cursor: default;
            opacity: 0.6;
            /* Lebih pudar agar jelas */
            animation: popInMatched 0.4s ease;
        }

        .card.matched .card-back {
            box-shadow: 0 0 0 4px #48c774;
            /* Glow hijau */
        }

        @keyframes popInMatched {
            0% {
                transform: rotateY(180deg) scale(0.9);
            }

            70% {
                transform: rotateY(180deg) scale(1.05);
            }

            100% {
                transform: rotateY(180deg) scale(1);
            }
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        @media (min-width: 600px) {
            .action-buttons {
                flex-direction: row;
            }
        }


        /* === TOMBOL (Gaya Konsisten) === */
        .submit-btn,
        .btn-primary,
        .btn-secondary {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .submit-btn:hover,
        .btn-primary:hover,
        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .submit-btn,
        .btn-primary {
            background: #667eea;
            color: white;
            margin-top: 15px;
        }

        .btn-secondary {
            background-color: #e9ecef;
            color: #333;
        }

        .back-link {
            display: inline-block;
            color: #764ba2;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="start-container">
        <h2>Game Mencocokkan Gambar</h2>
        <p>Temukan 3 pasang gambar yang sama!</p>

        <div id="game-board"></div>

        <button id="reset-btn" class="btn-primary">Mulai Ulang 🔄</button>
        <p><a href="../index.php" class="back-link">⬅ Kembali ke Beranda</a></p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const gameBoard = document.getElementById('game-board');
            const resetButton = document.getElementById('reset-btn');

            // Daftar gambar (hanya nama file, karena ada 3 pasang)
            const imageFiles = ['../img/cpu.jpg', '../img/motherboard.jpg', '../img/mouse.jpg'];
            // Buat array berisi pasangan gambar
            let gameImages = [...imageFiles, ...imageFiles];

            let flippedCards = [];
            let matchedPairs = 0;
            let lockBoard = false; // Mencegah klik saat kartu sedang dicek

            // Fungsi untuk mengacak urutan array
            function shuffle(array) {
                array.sort(() => Math.random() - 0.5);
            }

            // Fungsi untuk memulai atau mereset game
            function startGame() {
                gameBoard.innerHTML = '';
                shuffle(gameImages);
                matchedPairs = 0;

                gameImages.forEach(imageName => {
                    const card = document.createElement('div');
                    card.classList.add('card');
                    card.dataset.image = imageName;

                    card.innerHTML = `
                    <div class="card-face card-front">?</div>
                    <div class="card-face card-back">
                        <img src="${imageName}" alt="gambar puzzle">
                    </div>
                `;

                    card.addEventListener('click', flipCard);
                    gameBoard.appendChild(card);
                });
            }

            function flipCard() {
                if (lockBoard) return; // Jika board terkunci, jangan lakukan apa-apa
                if (this === flippedCards[0]) return; // Jangan biarkan kartu yang sama diklik dua kali

                this.classList.add('flipped');

                flippedCards.push(this);

                if (flippedCards.length === 2) {
                    lockBoard = true; // Kunci board agar tidak bisa klik kartu lain
                    checkForMatch();
                }
            }

            function checkForMatch() {
                const [card1, card2] = flippedCards;
                const isMatch = card1.dataset.image === card2.dataset.image;

                if (isMatch) {
                    disableCards();
                } else {
                    unflipCards();
                }
            }

            function disableCards() {
                flippedCards[0].classList.add('matched');
                flippedCards[1].classList.add('matched');

                matchedPairs++;
                resetBoard();

                // Cek kondisi menang
                if (matchedPairs === imageFiles.length) {
                    setTimeout(() => {
                        alert('Selamat! Anda berhasil menemukan semua pasangan!');
                    }, 500);
                }
            }

            function unflipCards() {
                setTimeout(() => {
                    flippedCards[0].classList.remove('flipped');
                    flippedCards[1].classList.remove('flipped');
                    resetBoard();
                }, 1000); // Beri waktu 1 detik sebelum kartu ditutup kembali
            }

            function resetBoard() {
                [flippedCards, lockBoard] = [
                    [], false
                ];
            }

            resetButton.addEventListener('click', startGame);

            // Mulai game saat halaman dimuat
            startGame();
        });
    </script>
</body>

</html>