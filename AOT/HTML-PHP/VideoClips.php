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
        <title>VideoClips</title>
        <link rel="stylesheet" href="../CSS/VideoClips.css" />
        <script src="../JS/VideoClips.js" defer></script>
    </head>

    <body>

    <!-- NAVIGATION BAR -->
    <header>
        <nav class="navbar">

            <?php renderNavigation($pdo); ?>

        </nav>
    </header>


        <!-- =========================
        HERO SECTION
        ========================= -->

        <section class="videoclips-hero">

            <!-- Background Video -->
            <video class="videoclips-hero-bg" autoplay muted loop>
                <source src="../Videos/AOT_VideoClips_Hero_Video.mp4" type="video/mp4">
            </video>

            <!-- Overlay -->
            <div class="videoclips-hero-overlay">

                <!-- Shadow Box -->
                <div class="videoclips-hero-box">
                    <h1 class="videoclips-title">
                        Video Clips
                    </h1>

                    <p class="videoclips-subtitle">
                        Experience <span class="green">Openings</span>, <span class="green">Endings</span>,
                        <span class="green">Trailers</span>, and iconic <span class="green">Scenes</span>
                        while the <span class="green">Soundtrack</span> plays.
                    </p>

                    <p class="videoclips-desc">
                        A curated visual archive where
                        <span class="green">Attack on Titan</span> music meets the moments it defined —
                        from legendary <span class="green">openings</span> and emotional
                        <span class="green">endings</span>, to promotional
                        <span class="green">trailers</span> and unforgettable
                        <span class="green">scenes</span> shaped by powerful
                        <span class="green">soundtracks</span>.
                    </p>

                    <p class="videoclips-alert">
                        <span class="green">Note:</span> Please keep in mind that the content underneath contains
                        <span class="Red">MAJOR SPOILERS</span> for those who <span class="Red">haven't</span> watched the
                        entire series yet, so proceed with caution.
                    </p>

                    <br>
                    <br>

                    <span class="green" id="have_fun">Enjoy!</span>

                </div>


            </div>

        </section>

        <!-- =========================
        SEASON 1
        ========================= -->
        <section class="season season-s1" id="season1">
            <video class="season-bg" autoplay muted loop>
                <source src="../Videos/AOT_VC_S1.mp4" type="video/mp4">
            </video>

            <div class="season-overlay">

                <div class="season-content split">

                    <!-- LEFT SIDE -->
                    <div class="season-left">
                        <h2 class="season-title">Season 1</h2>

                        <div class="season-choices">
                            <button class="choice-btn" data-type="intros">Intros / Outros</button>
                            <button class="choice-btn" data-type="trailers">Trailers</button>
                            <button class="choice-btn" data-type="scenes">Scenes</button>
                        </div>
                    </div>
                    

                    <?php
                    $sql = "SELECT id, season_id, track_id, title, type, video_src
                            FROM videos
                            WHERE season_id = 1
                            ORDER BY id";
                    $stmt = $pdo->query($sql);
                    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>


                    <!-- RIGHT SIDE -->
                    <div class="season-right">
                        <h3 class="playlist-heading"></h3>

                        <div class="playlist" data-playlist="intros">
                            <?php foreach ($videos as $video): ?>
                            <?php if (in_array($video['type'], ['intro', 'outro'])): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="trailers">
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'trailer'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="scenes">
                        <div class="coming-soon">Coming soon</div>
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'scene'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========================
        SEASON 2
        ========================= -->
        <section class="season season-s2" id="season2">
            <video class="season-bg" autoplay muted loop>
                <source src="../Videos/AOT_VC_S2.mp4" type="video/mp4">
            </video>

            <div class="season-overlay">

                <div class="season-content split">

                    <!-- LEFT SIDE -->
                    <div class="season-left">
                        <h2 class="season-title">Season 2</h2>

                        <div class="season-choices">
                            <button class="choice-btn" data-type="intros">Intros / Outros</button>
                            <button class="choice-btn" data-type="trailers">Trailers</button>
                            <button class="choice-btn" data-type="scenes">Scenes</button>
                        </div>
                    </div>

                    <?php
                    $sql = "SELECT id, season_id, track_id, title, type, video_src
                            FROM videos
                            WHERE season_id = 2
                            ORDER BY id";
                    $stmt = $pdo->query($sql);
                    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>


                    <!-- RIGHT SIDE -->
                    <div class="season-right">
                        <h3 class="playlist-heading"></h3>

                        <div class="playlist" data-playlist="intros">
                            <?php foreach ($videos as $video): ?>
                            <?php if (in_array($video['type'], ['intro', 'outro'])): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="trailers">
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'trailer'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="scenes">
                        <div class="coming-soon">Coming soon</div>
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'scene'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <!-- =========================
        SEASON 3
        ========================= -->
        <section class="season season-s3" id="season3">
            <video class="season-bg" autoplay muted loop>
                <source src="../Videos/AOT_VC_S3.mp4" type="video/mp4">
            </video>

            <div class="season-overlay">

                <div class="season-content split">

                    <!-- LEFT SIDE -->
                    <div class="season-left">
                        <h2 class="season-title">Season 3</h2>

                        <div class="season-choices">
                            <button class="choice-btn" data-type="intros">Intros / Outros</button>
                            <button class="choice-btn" data-type="trailers">Trailers</button>
                            <button class="choice-btn" data-type="scenes">Scenes</button>
                        </div>
                    </div>

                    <?php
                    $sql = "SELECT id, season_id, track_id, title, type, video_src
                            FROM videos
                            WHERE season_id = 3
                            ORDER BY id";
                    $stmt = $pdo->query($sql);
                    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <!-- RIGHT SIDE -->
                    <div class="season-right">
                        <!-- PLAYLISTS (hidden by default) -->
                        <h3 class="playlist-heading"></h3>
                        <div class="playlist" data-playlist="intros">
                            <?php foreach ($videos as $video): ?>
                            <?php if (in_array($video['type'], ['intro', 'outro'])): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                <div class="playlist-thumb"></div>
                                <div class="playlist-title">
                                    <?= htmlspecialchars($video['title']) ?>
                                </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="trailers">
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'trailer'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                <div class="playlist-thumb"></div>
                                <div class="playlist-title">
                                    <?= htmlspecialchars($video['title']) ?>
                                </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="scenes">
                        <div class="coming-soon">Coming soon</div>
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'scene'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                <div class="playlist-thumb"></div>
                                <div class="playlist-title">
                                    <?= htmlspecialchars($video['title']) ?>
                                </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========================
        SEASON 4
        ========================= -->
        <section class="season season-s4" id="season4">
            <video class="season-bg" autoplay muted loop>
                <source src="../Videos/AOT_VC_S4.mp4" type="video/mp4">
            </video>

            <div class="season-overlay">

                <div class="season-content split">

                    <!-- LEFT SIDE -->
                    <div class="season-left">
                        <h2 class="season-title">Season 4</h2>

                        <div class="season-choices">
                            <button class="choice-btn" data-type="intros">Intros / Outros</button>
                            <button class="choice-btn" data-type="trailers">Trailers</button>
                            <button class="choice-btn" data-type="scenes">Scenes</button>
                        </div>
                    </div>


                    <?php
                    $sql = "SELECT id, season_id, track_id, title, type, video_src
                            FROM videos
                            WHERE season_id = 4
                            ORDER BY id";
                    $stmt = $pdo->query($sql);
                    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>


                    <!-- RIGHT SIDE -->
                    <div class="season-right">
                        <h3 class="playlist-heading"></h3>

                        <div class="playlist" data-playlist="intros">
                            <?php foreach ($videos as $video): ?>
                            <?php if (in_array($video['type'], ['intro', 'outro'])): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="trailers">
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'trailer'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="scenes">
                        <div class="coming-soon">Coming soon</div>
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'scene'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <!-- =========================
        LAST ATTACK
        ========================= -->
        <section class="season season-s5" id="season5">
            <video class="season-bg" autoplay muted loop>
                <source src="../Videos/AOT_VC_S5.mp4" type="video/mp4">
            </video>

            <div class="season-overlay">

                <div class="season-content split">

                    <!-- LEFT SIDE -->
                    <div class="season-left">
                        <h2 class="season-title">Last Attack</h2>

                        <div class="season-choices">
                            <button class="choice-btn" data-type="intros">Intros / Outros</button>
                            <button class="choice-btn" data-type="trailers">Trailers</button>
                            <button class="choice-btn" data-type="scenes">Scenes</button>
                        </div>
                    </div>


                    <?php
                    $sql = "SELECT id, season_id, track_id, title, type, video_src
                            FROM videos
                            WHERE season_id = 5
                            ORDER BY id";
                    $stmt = $pdo->query($sql);
                    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <!-- RIGHT SIDE -->
                    <div class="season-right">
                        <h3 class="playlist-heading"></h3>

                        <div class="playlist" data-playlist="intros">
                            <?php foreach ($videos as $video): ?>
                            <?php if (in_array($video['type'], ['intro', 'outro'])): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="trailers">
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'trailer'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="playlist" data-playlist="scenes">
                        <div class="coming-soon">Coming soon</div>
                            <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] === 'scene'): ?>
                                <div class="playlist-item"
                                    data-video-src="../<?= htmlspecialchars($video['video_src']) ?>"
                                    data-track-id="<?= $video['track_id'] ?>"
                                    data-auto-thumb="true">
                                    <div class="playlist-thumb"></div>
                                    <div class="playlist-title">
                                        <?= htmlspecialchars($video['title']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- VIDEO MODAL -->
        <div class="video-modal" id="videoModal">
            <div class="video-modal-overlay"></div>

            <div class="video-modal-content">
                <button class="video-modal-close">&times;</button>

                <video id="modalVideo" controls></video>
            </div>
        </div>


    </body>

    </html>