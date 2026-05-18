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
    <title>AOT_Track – Season 1 OST</title>
    <link rel="stylesheet" href="../CSS/Playlist_Season1.css" />
    <script src="../JS/Playlist_Functions.js" defer></script>
</head>

<body data-album-color="hsl(216,100%,60%)">

    <!-- NAVIGATION BAR -->
    <header>
        <nav class="navbar">

            <?php renderNavigation($pdo); ?>

        </nav>
    </header>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="album-layout">

        <!-- LEFT: BIG COVER -->
        <div class="album-cover-section">
            <img src="../Images/Cover1.jpg" class="album-cover">
            <br>
            <button type="button" onclick="window.location.href='Playlist_Albums.php'" class="back-btn">
                Back To Album Page
            </button>
        </div>

        <!-- RIGHT: DETAILS + TRACKLIST -->
        <div class="album-info">

            <h1 class="album-title">"Attack on Titan" Season 1</h1>
            <h3 class="album-writer"><span class="white_M">Music by</span> HIROYUKI SAWANO</h3>

            <div class="wave-container">
                <canvas id="waveform"></canvas>
            </div>



            <div class="controls">

                <!-- PLAY BUTTON (TOP) -->
                <button class="play-main">

                    <!-- PLAY ICON -->
                    <svg class="play-main-play" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z" />
                        <circle cx="12" cy="12" r="10" />
                    </svg>

                    <!-- PAUSE ICON -->
                    <svg class="play-main-pause" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        style="display:none;">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="10" y1="15" x2="10" y2="9" />
                        <line x1="14" y1="15" x2="14" y2="9" />
                    </svg>

                </button>

                <!-- SHUFFLE BUTTON -->
                <button class="shuffle-btn">
                    <svg class="shuffle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 14 4 4-4 4" />
                        <path d="m18 2 4 4-4 4" />
                        <path d="M2 18h1.973a4 4 0 0 0 3.3-1.7l5.454-8.6a4 4 0 0 1 3.3-1.7H22" />
                        <path d="M2 6h1.972a4 4 0 0 1 3.6 2.2" />
                        <path d="M22 18h-6.041a4 4 0 0 1-3.3-1.8l-.359-.45" />
                    </svg>
                </button>

            </div>

            <!-- TRACKLIST -->
            <div class="tracklist">

                <table class="track-table">
                    <tbody>
                            <?php
                                $sql = "SELECT 
                                        t.id,
                                        t.track_number,
                                        t.title,
                                        t.audio_src,
                                        EXISTS (
                                            SELECT 1 FROM videos v WHERE v.track_id = t.id
                                        ) AS has_video
                                    FROM tracks t
                                    WHERE t.album_id = 1
                                    ORDER BY t.track_number ASC";
                            $stmt = $pdo->query($sql);
                            $tracks = $stmt->fetchAll();

                            $index = 0;

                            foreach ($tracks as $track) {
                                echo "<tr><td>";
                                echo "<div class='track'
                                        data-index='{$index}'
                                        data-track-id='{$track['id']}'
                                        data-src=\"../{$track['audio_src']}\"
                                        data-has-video='{$track['has_video']}'>";
                                echo str_pad($track["track_number"], 2, "0", STR_PAD_LEFT);
                                echo " — ";
                                echo htmlspecialchars($track["title"]);
                                echo "</div>";
                                echo "</td></tr>";
                                $index++;
                            }
                            ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="track-actions">
            <button class="video-btn">
                Show Video Clip
            </button>
        </div>

    </div>

    <!-- PLAYER BAR -->
    <div class="player-bar">

        <!-- LEFT: CURRENT TRACK -->
        <div class="player-left">
            <span class="current-title">No track selected</span>
        </div>

        <!-- CENTER: CONTROLS + SEEK -->
        <div class="player-center">

            <!-- CONTROLS -->
            <div class="player-controls">

                <!-- SHUFFLE BUTTON -->
                <button class="shuffle-btn-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 14 4 4-4 4" />
                        <path d="m18 2 4 4-4 4" />
                        <path d="M2 18h1.973a4 4 0 0 0 3.3-1.7l5.454-8.6a4 4 0 0 1 3.3-1.7H22" />
                        <path d="M2 6h1.972a4 4 0 0 1 3.6 2.2" />
                        <path d="M22 18h-6.041a4 4 0 0 1-3.3-1.8l-.359-.45" />
                    </svg>
                </button>

                <button class="prev-btn">

                    <!-- PREVIOUS ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M17.971 4.285A2 2 0 0 1 21 6v12a2 2 0 0 1-3.029 1.715l-9.997-5.998a2 2 0 0 1-.003-3.432z" />
                        <path d="M3 20V4" />
                    </svg>
                </button>


                <button class="play-btn">

                    <!-- PLAY ICON -->
                    <svg class="play-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 5a2 2 0 0 1 3.008-1.728l11.997 6.998a2 2 0 0 1 .003 3.458l-12 7A2 2 0 0 1 5 19z" />
                    </svg>

                    <!-- PAUSE ICON -->
                    <svg class="pause-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        style="display:none;">
                        <rect x="14" y="3" width="5" height="18" rx="1" />
                        <rect x="5" y="3" width="5" height="18" rx="1" />
                    </svg>

                </button>

                <button class="next-btn">

                    <!-- NEXT ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 4v16" />
                        <path
                            d="M6.029 4.285A2 2 0 0 0 3 6v12a2 2 0 0 0 3.029 1.715l9.997-5.998a2 2 0 0 0 .003-3.432z" />
                    </svg>
                </button>

                <button class="repeat-btn repeat-normal">

                    <!-- NORMAL -->
                    <svg class="repeat-normal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 15h20" />
                        <path d="m19 10 4 5-4 5" />
                        <path d="M7.5 11l2.2-6 2.2 6" stroke-width="1.5" />
                        <path d="M8.6 9.9h2.2" stroke-width="1.5" />
                    </svg>

                    <!-- REPEAT TRACK -->
                    <svg class="repeat-track" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m17 2 4 4-4 4" />
                        <path d="M3 11v-1a4 4 0 0 1 4-4h14" />
                        <path d="m7 22-4-4 4-4" />
                        <path d="M21 13v1a4 4 0 0 1-4 4H3" />
                        <path d="M11 10h1v4" />
                    </svg>

                    <!-- REPEAT PLAYLIST -->
                    <svg class="repeat-playlist" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                        <path d="m17 2 4 4-4 4" />
                        <path d="M3 11v-1a4 4 0 0 1 4-4h14" />
                        <path d="m7 22-4-4 4-4" />
                        <path d="M21 13v1a4 4 0 0 1-4 4H3" />

                        <path d="M10.2 14.5l1.8-5 1.8 5" stroke-width="1.5" />
                        <path d="M11.1 13.3h1.8" stroke-width="1.5" />
                    </svg>

                </button>



            </div>

            <!-- SEEK BAR -->
            <div class="seek-wrapper">
                <span class="time time-current">0:00</span>

                <input type="range" class="seek-bar" min="0" max="100" value="0">

                <span class="time time-duration">--:--</span>
            </div>

        </div>

        <!-- RIGHT: VOLUME -->
        <div class="player-right">

            <!-- VOLUME BUTTON -->
            <button class="volume-btn">

                <!-- MUTE -->
                <svg class="vol-icon vol-mute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-volume-x-icon lucide-volume-x">
                    <path
                        d="M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z" />
                    <line x1="22" x2="16" y1="9" y2="15" />
                    <line x1="16" x2="22" y1="9" y2="15" />
                </svg>

                <!-- LOW -->
                <svg class="vol-icon vol-low" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-volume-icon lucide-volume">
                    <path
                        d="M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z" />
                </svg>

                <svg class="vol-icon vol-mid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-volume1-icon lucide-volume-1">
                    <path
                        d="M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z" />
                    <path d="M16 9a5 5 0 0 1 0 6" />
                </svg>

                <!-- HIGH -->
                <svg class="vol-icon vol-high" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-volume2-icon lucide-volume-2">
                    <path
                        d="M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z" />
                    <path d="M16 9a5 5 0 0 1 0 6" />
                    <path d="M19.364 18.364a9 9 0 0 0 0-12.728" />
                </svg>

                <!-- MAX -->
                <svg class="vol-icon vol-max" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z" />
                    <path d="M16 9a5 5 0 0 1 0 6" />
                    <path d="M19.364 18.364a9 9 0 0 0 0-12.728" />
                    <path d="M22.728 21.728a13 13 0 0 0 0-19.456" />
                </svg>

            </button>

            <!-- VOLUME BAR -->
            <input type="range" class="volume-bar" min="0" max="1" step="0.01" value="1">

        </div>


    </div>

    <!-- AUDIO ELEMENT -->
    <audio id="audio-player"></audio>

</body>

</html>