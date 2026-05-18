<?php
require_once __DIR__ . '/../PHP/src/database.php';
require_once __DIR__ . '/../PHP/src/navigation.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Abd-ZY" />
    <title>AOT_Track - Home</title>
    <link rel="stylesheet" href="../CSS/Index.css" />
    <script src="../JS/Index.js" defer></script>
</head>

<body>
    <!-- NAVIGATION BAR -->
    <header>
        <nav class="navbar">

            <?php renderNavigation($pdo); ?>

        </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-center">
            <h1 class="hero-title">
                <span class="top-line">Welcome to the</span>
                <span class="bottom-line"><span class="aot-highlight">Attack on Titan</span> Multimedia Archive</span>
            </h1>
            <div class="hero-content">
                <div class="hero-video-container">
                    <video autoplay muted loop class="hero-video">
                        <source src="../Videos/AOT_Hero_Video.mp4" type="video/mp4" />
                    </video>
                </div>

                <div class="hero-text-container">
                    <p id="typewriter-text" class="hero-desc"></p>
                    <p id="typewriter-text-bottom" class="hero-desc"></p>
                </div>
            </div>
        </div>
    </section>


    <div class="chain-border"></div>
    <section class="spoiler-section"></section>
    <div class="chain-border"></div>

    <!-- SEASON 1 -->
    <section class="season">
        <video autoplay muted loop class="bg-video">
            <source src="../Videos/AOT_Se1_Bg.mp4" type="video/mp4" />
        </video>

        <div class="season-card">
            <div class="season-header">
                <h2>Season 1</h2>
                <span class="part-badge">HATE & TRUST</span>
            </div>
            <p class="arc-list">
                Arcs: <br>
                <span class="arc-name">Fall of Shiganshina</span> |
                <span class="arc-name">Battle of Trost</span> |
                <span class="arc-name">104th Cadet Corps Training</span> | <br>
                <span class="arc-name">The Female Titan</span>
            </p>
            <p class="season-desc">
                Humanity hides behind walls to survive against giant man-eating
                creatures known as the Titans. When a Colossal Titan breaches the
                wall, the fight for survival and freedom begins.
            </p>
            <div class="rating">
                <span class="star">★</span><span class="score">9.1/10</span>
                <span class="source">IMDb Rating</span>
            </div>
            <div class="buttons">
                <a href="../HTML-PHP/Playlist_Albums.php?season=1#albums" class="btn red">
                    Listen to Soundtrack
                </a>

                <a href="../HTML-PHP/VideoClips.php#season1" class="btn dark">Watch Video Music</a>
            </div>
        </div>

        <!-- ARC GALLERY SLIDESHOW -->
        <div class="arc-gallery">
            <img src="../Images/arc1_1.png" alt="Fall of Shiganshina Arc" class="active" />
            <img src="../Images/arc1_2.png" alt="Battle of Trost Arc" />
            <img src="../Images/arc1_3.png" alt="The Female Titan Arc" />
            <img src="../Images/arc1_4.png" alt="The Female Titan Arc" />
        </div>
    </section>

    <div class="chain-border"></div>

    <!-- SEASON 2 -->
    <section class="season">
        <video autoplay muted loop class="bg-video">
            <source src="../Videos/AOT_Se2_Bg.mp4" type="video/mp4" />
        </video>

        <div class="season-card">
            <div class="season-header">
                <h2>Season 2</h2>
                <span class="part-badge">BETRAYAL</span>
            </div>
            <p class="arc-list">
                Arcs: <br>
                <span class="arc-name">Beast Titan</span> |
                <span class="arc-name">Clash of the Titans</span>
            </p>
            <p class="season-desc">
                Secrets within the walls begin to unravel as hidden truths about the
                Titans come to light. The Scouts face betrayal from within as
                humanity’s trust fractures.
            </p>
            <div class="rating">
                <span class="star">★</span><span class="score">9.7/10</span>
                <span class="source">IMDb Rating</span>
            </div>
            <div class="buttons">
                <a href="../HTML-PHP/Playlist_Albums.php?season=2#albums" class="btn red">
                    Listen to Soundtrack
                </a>

                <a href="../HTML-PHP/VideoClips.php#season2" class="btn dark">Watch Video Music</a>
            </div>
        </div>

        <div class="arc-gallery">
            <img src="../Images/arc2_1.png" alt="Clash of the Titans Arc" class="active" />
            <img src="../Images/arc2_2.png" alt="Uprising Arc" />
        </div>
    </section>

    <div class="chain-border"></div>

    <!-- SEASON 3 -->
    <section class="season">
        <video autoplay muted loop class="bg-video">
            <source src="../Videos/AOT_Se3_Bg.mp4" type="video/mp4" />
        </video>

        <div class="season-card">
            <div class="season-header">
                <h2>Season 3</h2>
                <span class="part-badge">POWER & TRUTH</span>
            </div>
            <p class="arc-list">
                Arcs: <br>
                <span class="arc-name">Uprising</span> |
                <span class="arc-name">Return to Shiganshina</span> |
                <span class="arc-name">Revelation of the Basement</span>
            </p>
            <p class="season-desc">
                Political turmoil erupts as humanity’s greatest secrets are revealed.
                The Scouts discover the truth beyond the walls and the origins of the
                Titans.
            </p>
            <div class="rating">
                <span class="star">★</span><span class="score">9.8/10</span>
                <span class="source">IMDb Rating</span>
            </div>
            <div class="buttons">
                <a href="../HTML-PHP/Playlist_Albums.php?season=3#albums" class="btn red">
                    Listen to Soundtrack
                </a>

                <a href="../HTML-PHP/VideoClips.php#season3" class="btn dark">Watch Video Music</a>
            </div>
        </div>

        <div class="arc-gallery">
            <img src="../Images/arc3_1.png" alt="Return to Shiganshina Arc" class="active" />
            <img src="../Images/arc3_2.png" alt="Revelation of the Basement Arc" />
            <img src="../Images/arc3_3.png" alt="Marley Prelude Arc" />
            <img src="../Images/arc3_4.png" alt="Marley Prelude Arc" />
            <img src="../Images/arc3_5.png" alt="Marley Prelude Arc" />
        </div>
    </section>

    <div class="chain-border"></div>

    <!-- SEASON 4 -->
    <section class="season">
        <video autoplay muted loop class="bg-video">
            <source src="../Videos/AOT_Se4_Bg.mp4" type="video/mp4" />
        </video>

        <div class="season-card">
            <div class="season-header">
                <h2>Season 4</h2>
                <span class="part-badge">WAR</span>
            </div>
            <p class="arc-list">
                Arcs: <br>
                <span class="arc-name">Marley</span> |
                <span class="arc-name">War for Paradis</span>
            </p>
            <p class="season-desc">
                The final war begins as Marley and Paradis clash. Heroes and enemies
                blur, and the fight for freedom reaches its devastating conclusion.
            </p>
            <div class="rating">
                <span class="star">★</span><span class="score">9.9/10</span>
                <span class="source">IMDb Rating</span>
            </div>
            <div class="buttons">
                <a href="../HTML-PHP/Playlist_Albums.php?season=4#albums" class="btn red">
                    Listen to Soundtrack
                </a>

                <a href="../HTML-PHP/VideoClips.php#season4" class="btn dark">Watch Video Music</a>
            </div>
        </div>

        <div class="arc-gallery">
            <img src="../Images/arc4_1.png" alt="War for Paradis Arc" class="active" />
            <img src="../Images/arc4_2.png" alt="Return to Marley Arc" />
            <img src="../Images/arc4_3.png" alt="Final Chapters Arc" />
            <img src="../Images/arc4_4.png" alt="Final Chapters Arc" />
            <img src="../Images/arc4_5.png" alt="Final Chapters Arc" />
        </div>
    </section>

    <div class="chain-border"></div>

    <!-- Movie -->
    <section class="season">
        <video autoplay muted loop class="bg-video">
            <source src="../Videos/AOT_Se5_Bg.mp4" type="video/mp4" />
        </video>

        <div class="season-card">
            <div class="season-header">
                <h2>LAST ATTACK</h2>
                <span class="part-badge">FREEDOM</span>
            </div>
            <p class="arc-list">
                Arcs: <br>
                <span class="arc-name">Rumbling</span>
            </p>
            <p class="season-desc">
                Humanity faces its darkest hour as the Rumbling reshapes the world. Allies and enemies unite for a final
                stand against an impossible fate, where sacrifice, conviction, and the meaning of freedom collide.
            </p>
            <div class="rating">
                <span class="star">★</span><span class="score">9.1/10</span>
                <span class="source">IMDb Rating</span>
            </div>
            <div class="buttons">
                <a href="../HTML-PHP/Playlist_Albums.php?season=4#albums" class="btn red">
                    Listen to Soundtrack
                </a>

                <a href="../HTML-php/VideoClips.php#season5" class="btn dark">Watch Video Music</a>
            </div>
        </div>

        <div class="arc-gallery">
            <img src="../Images/arc5_1.png" alt="War for Paradis Arc" class="active" />
            <img src="../Images/arc5_2.png" alt="Return to Marley Arc" />
            <img src="../Images/arc5_3.png" alt="Final Chapters Arc" />
            <img src="../Images/arc5_4.png" alt="Final Chapters Arc" />
        </div>
    </section>

    <footer class="copyright">
        © <span id="year"></span> <span class="cpColor">Abd-ZY</span> - All rights reserved.
    </footer>

</body>

</html>