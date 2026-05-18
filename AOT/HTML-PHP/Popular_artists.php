<?php
require_once __DIR__ . '/../PHP/src/database.php';
require_once __DIR__ . '/../PHP/src/navigation.php';
require_once __DIR__ . '/../PHP/src/db_popular_artists.php';

$artists = getPopularArtists($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Abd-ZY" />
    <title>Popular Artists</title>
    <link rel="stylesheet" href="../CSS/Popular_artists.css">
    <script src="../JS/Nav.js" defer></script>
</head>

<body>

<header>
    <nav class="navbar">
        <?php renderNavigation($pdo); ?>
    </nav>
</header>

<h1 class="page-title">Popular Artists</h1>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Artist</th>
                <th>Genre</th>
                <th>Debut</th>
                <th>Country</th>
                <th>Notable Work</th>
                <th>Wikipedia</th>
                <th>YouTube</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($artists as $artist): ?>
            <tr>
                <!-- ARTIST NAME (wiki link) -->
                <td class="artist-name">
                    <a href="<?= htmlspecialchars($artist['wikipedia_link']) ?>" target="_blank">
                        <?= htmlspecialchars($artist['artist_name']) ?>
                    </a>
                </td>

                <td><?= htmlspecialchars($artist['genre']) ?></td>
                <td><?= htmlspecialchars($artist['debut_year']) ?></td>
                <td><?= htmlspecialchars($artist['country']) ?></td>
                <td><?= htmlspecialchars($artist['notable_work']) ?></td>

                <!-- WIKIPEDIA ICON -->
                <td class="wiki-cell">
                    <a href="<?= htmlspecialchars($artist['wikipedia_link']) ?>" target="_blank">
                        <img src="../Images/wiki_icon.png" alt="Wikipedia" class="wiki-icon">
                    </a>
                </td>

                <!-- YOUTUBE ICON -->
                <td class="yt-cell">
                    <a href="<?= htmlspecialchars($artist['youtube_link']) ?>" target="_blank">
                        <img src="../Images/youtube_icon.png" alt="YouTube" class="yt-icon">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>

</body>
</html>
