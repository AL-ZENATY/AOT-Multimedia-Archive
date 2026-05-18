<?php

function getArtists(PDO $pdo): array
{
    $sql = "SELECT
              id,
              name,
              bio,
              role,
              image,
              song1,
              song2,
              song3
            FROM artists
            ORDER BY id ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
