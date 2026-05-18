<?php
require_once __DIR__ . '/../PHP/src/database.php';
require_once __DIR__ . '/../PHP/src/navigation.php';
require_once __DIR__ . '/../PHP/src/db_artists.php';

$artists = getArtists($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Abd-ZY" />
    <title>AOT_Track – Artists</title>
    <link rel="stylesheet" href="../CSS/Artists.css" />
    <script src="../JS/Nav.js" defer></script>
</head>

<body>

<header>
            <nav class="navbar">

            <?php renderNavigation($pdo); ?>

            </nav>
  <h1 class="page-title">Attack on Titan <span class="s_white">–</span>  <span class="s_gold">Artists</span></h1>
</header>

<main class="artists-container">

<video class="bg-video" autoplay muted loop playsinline>
  <source src="../Videos/AOT_Artists_Bg.mp4" type="video/mp4">
</video>


  <?php foreach ($artists as $artist): ?>
    <section class="artist-card">

      <div class="artist-image">
        <img src="../Images/<?php echo htmlspecialchars($artist['image']); ?>"
             alt="<?php echo htmlspecialchars($artist['name']); ?>">
      </div>

      <div class="artist-info">
        <h2><?php echo htmlspecialchars($artist['name']); ?></h2>

        <?php if (!empty($artist['role'])): ?>
          <p class="artist-role"><?php echo htmlspecialchars($artist['role']); ?></p>
        <?php endif; ?>

        <p class="artist-bio">
          <?php echo nl2br(htmlspecialchars($artist['bio'])); ?>
        </p>

        <div class="artist-songs">
          <h3>Top Attack on Titan Tracks</h3>
          <ul>
            <li><?php echo htmlspecialchars($artist['song1']); ?></li>
            <li><?php echo htmlspecialchars($artist['song2']); ?></li>
            <li><?php echo htmlspecialchars($artist['song3']); ?></li>
          </ul>
        </div>
      </div>

    </section>
  <?php endforeach; ?>

</main>

</body>
</html>
