<?php

function renderNavigation(PDO $pdo)
{
    $sql = "SELECT label, url, display_mode, icon
            FROM navigation
            ORDER BY sort_order ASC";

    $stmt = $pdo->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $homeItem = '';
    $navItems = '';

    foreach ($items as $item) {

        $label = htmlspecialchars($item['label']);
        $url   = htmlspecialchars($item['url']);
        $icon  = $item['icon'];

        $html  = '<li class="nav-item nav-' . strtolower(str_replace(' ', '-', $label)) . '">';
        $html .= '<a href="' . $url . '">';

        if ($icon) {
            $html .= '<img src="../Images/' . htmlspecialchars($icon) . '" class="nav-icon" alt="' . $label . '">';
        }

        $html .= '<span class="nav-text">' . $label . '</span>';
        $html .= '</a></li>';

        if ($label === 'Home') {
            $homeItem = $html;
        } else {
            $navItems .= $html;
        }
    }

    echo '<ul class="nav-links nav-left">' . $homeItem . '</ul>';
    echo '<ul class="nav-links nav-right">' . $navItems . '</ul>';
}


?>