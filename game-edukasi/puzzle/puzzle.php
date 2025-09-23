<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Game Puzzle Komputer</title>
    <link rel="stylesheet" href="puzzle.css">
</head>

<body>
    <div class="container">
        <h2>Game Puzzle - Susun Gambar Ini!</h2>
        <div id="puzzle-container"></div>
        <button id="reset-btn">Acak Ulang</button>
        <p><a href="../index.php" class="back-link">Kembali ke Beranda</a></p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('puzzle-container');
            const resetButton = document.getElementById('reset-btn');
            const imageSrc = '../img/mouse.jpg'; // Ganti dengan gambar Anda
            const gridSize = 3; // 3x3 grid

            let tiles = [];
            let emptyTile = {
                row: gridSize - 1,
                col: gridSize - 1
            };

            function setupPuzzle() {
                container.innerHTML = '';
                container.style.gridTemplateColumns = `repeat(${gridSize}, 100px)`;
                tiles = [];

                for (let i = 0; i < gridSize * gridSize - 1; i++) {
                    const tile = document.createElement('div');
                    tile.classList.add('puzzle-tile');

                    const row = Math.floor(i / gridSize);
                    const col = i % gridSize;

                    tile.style.backgroundImage = `url(${imageSrc})`;
                    tile.style.backgroundSize = `${gridSize * 100}px ${gridSize * 100}px`;
                    tile.style.backgroundPosition = `-${col * 100}px -${row * 100}px`;

                    tile.dataset.row = row;
                    tile.dataset.col = col;

                    tile.addEventListener('click', () => moveTile(tile));

                    tiles.push({
                        element: tile,
                        row,
                        col
                    });
                    container.appendChild(tile);
                }
                shuffleTiles();
            }

            function shuffleTiles() {
                for (let i = 0; i < 100; i++) {
                    const neighbors = getNeighbors(emptyTile);
                    const randomNeighbor = neighbors[Math.floor(Math.random() * neighbors.length)];
                    swapTiles(randomNeighbor, emptyTile);
                }
                renderTiles();
            }

            function moveTile(tileElement) {
                const tile = findTile(parseInt(tileElement.dataset.row), parseInt(tileElement.dataset.col));
                if (isNeighbor(tile, emptyTile)) {
                    swapTiles(tile, emptyTile);
                    renderTiles();
                    checkWin();
                }
            }

            function swapTiles(tile1, tile2) {
                // Swap positions in the logical grid
                const tempRow = tile1.row;
                const tempCol = tile1.col;
                tile1.row = tile2.row;
                tile1.col = tile2.col;
                tile2.row = tempRow;
                tile2.col = tempCol;
            }

            function renderTiles() {
                tiles.forEach(tile => {
                    tile.element.style.gridRow = tile.row + 1;
                    tile.element.style.gridColumn = tile.col + 1;
                });
            }

            function getNeighbors({
                row,
                col
            }) {
                const neighbors = [];
                if (row > 0) neighbors.push(findTileInArray(row - 1, col));
                if (row < gridSize - 1) neighbors.push(findTileInArray(row + 1, col));
                if (col > 0) neighbors.push(findTileInArray(row, col - 1));
                if (col < gridSize - 1) neighbors.push(findTileInArray(row, col + 1));
                return neighbors.filter(t => t);
            }

            function findTileInArray(row, col) {
                return tiles.find(t => t.row === row && t.col === col);
            }

            function findTile(row, col) {
                return tiles.find(t => parseInt(t.element.dataset.row) === row && parseInt(t.element.dataset.col) === col);
            }

            function isNeighbor(tile1, tile2) {
                const rowDiff = Math.abs(tile1.row - tile2.row);
                const colDiff = Math.abs(tile1.col - tile2.col);
                return (rowDiff === 1 && colDiff === 0) || (rowDiff === 0 && colDiff === 1);
            }

            function checkWin() {
                let won = true;
                for (let i = 0; i < tiles.length; i++) {
                    const originalRow = Math.floor(i / gridSize);
                    const originalCol = i % gridSize;
                    if (tiles[i].row !== originalRow || tiles[i].col !== originalCol) {
                        won = false;
                        break;
                    }
                }
                if (won) {
                    setTimeout(() => alert('Selamat, Anda berhasil!'), 100);
                }
            }

            resetButton.addEventListener('click', setupPuzzle);
            setupPuzzle();
        });
    </script>
</body>

</html>