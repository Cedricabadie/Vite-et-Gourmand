<?php
session_start();
require_once '../includes/config.php';
require_once '../includes/db.php';
require_once '../includes/auth.php';
require_once '../includes/functions.php';
$pageTitle = 'Nos menus – Vite & Gourmand';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main>
        <!-- Filtres (prix, thème, régime, nb personnes) -->
        <section id="filtres" aria-label="Filtrer les menus">
            <!-- TODO: feature/menus -->
        </section>
        <!-- Liste des menus (mise à jour dynamique via AJAX) -->
        <section id="liste-menus" aria-live="polite">
            <!-- TODO: feature/menus -->
        </section>
    </main>
    <?php include '../includes/footer.php'; ?>
    <script src="../assets/js/main.js"></script>
</body>
</html>
