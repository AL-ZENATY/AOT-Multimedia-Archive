<?php

function getPopularArtists(PDO $pdo): array
{
    $sql = "
        SELECT
            artist_id,
            artist_name,
            genre,
            debut_year,
            country,
            notable_work,
            youtube_link,
            wikipedia_link
        FROM popular_artists
        ORDER BY artist_name ASC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
