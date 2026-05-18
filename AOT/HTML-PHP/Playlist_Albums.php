<?php
require_once __DIR__ . '/../PHP/src/database.php';
require_once __DIR__ . '/../PHP/src/navigation.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Abd-ZY" />
    <title>AOT_Track – Soundtracks</title>
    <link rel="stylesheet" href="../CSS/Playlist_Albums.css" />
    <script src="../JS/Playlist_Albums.js" defer></script>
</head>

<body>
    
    <!-- NAVIGATION BAR -->
    <header>
        <nav class="navbar">

            <?php renderNavigation($pdo); ?>

        </nav>
    </header>

    <!-- PAGE HEADER -->
    <section class="page-banner">
        <div class="banner-title">
            <p class="writer">Music by HIROYUKI SAWANO</p>
            <p class="page-title">"Attack on Titan" Original Soundtracks</p>
        </div>

    </section>

    <div class="comic-Chain-border"></div>

    <!-- SEASON LIST SECTION -->
    <section class="playlist-seasons" id="albums">

        <!-- SEASON 1 CARD -->
        <a href="Playlist_Season1.php" class="playlist-card" id="season-1">
            <img src="../Images/Cover1.jpg" class="card-bg">
            <div class="card-overlay">
                <p class="writer_C1">Music by HIROYUKI SAWANO</p>
                <p class="album-title_C1">"Attack on Titan" Season 1</p>
                <p class="album-sub_C1">Original Soundtrack</p>
            </div>
        </a>


        <!-- SEASON 2 CARD -->
        <a href="Playlist_Season2.php" class="playlist-card" id="season-2">
            <img src="../Images/Cover2.jpg" class="card-bg">
            <div class="card-overlay">
                <p class="writer_C2">Music by HIROYUKI SAWANO</p>
                <p class="album-title_C2">"Attack on Titan" Season 2</p>
                <p class="album-sub_C2">Original Soundtrack</p>
            </div>
        </a>


        <!-- SEASON 3 CARD -->
        <a href="Playlist_Season3.php" class="playlist-card" id="season-3">
            <img src="../Images/Cover3.jpg" class="card-bg">
            <div class="card-overlay">
                <p class="writer_C3">Music by HIROYUKI SAWANO</p>
                <p class="album-title_C3">"Attack on Titan" Season 3</p>
                <p class="album-sub_C3">Original Soundtrack</p>
            </div>
        </a>


        <!-- SEASON 4 CARD -->
        <a href="Playlist_Season4.php" class="playlist-card" id="season-4">
            <img src="../Images/Cover4.jpg" class="card-bg">
            <div class="card-overlay">
                <p class="writer_C4">Music by KOHTA YAMAMOTO / HIROYUKI SAWANO</p>
                <p class="album-title_C4">"Attack on Titan" The Final Season</p>
                <p class="album-sub_C4">Original Soundtrack</p>
            </div>
        </a>

    </section>

    <footer class="copyright">
        © <span id="year"></span> <span class="cpColor">Abd-ZY</span> - All rights reserved.
    </footer>

</body>

</html>