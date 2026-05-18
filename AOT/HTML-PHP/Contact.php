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
    <title>Contact</title>
    <link rel="stylesheet" href="../CSS/Contact.css" />
    <script src="../JS/Contact.js" defer></script>
    <script src="../JS/Nav.js" defer></script>
</head>

<body>

<header>
    <nav class="navbar">
        <?php renderNavigation($pdo); ?>
    </nav>
</header>

<h1 class="page-title">Contact</h1>

<section class="contact-wrapper">

    <form id="contactForm" class="contact-form">

        <label for="first_name">First Name *</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name *</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="contact_info">Email or Phone</label>
        <input type="text" id="contact_info" name="contact_info">

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5"></textarea>

        <div class="form-buttons">
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </div>

    </form>

    <p id="thankYouMessage" class="thank-you">
        No submission yet.<br>
        Your message status will appear here.
    </p>

</section>

</body>
</html>
