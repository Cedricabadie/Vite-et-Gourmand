<?php if (!isset($pageTitle)) $pageTitle = 'Vite & Gourmand'; ?>
<header role="banner">
    <nav role="navigation" aria-label="Menu principal">
        <a href="<?= BASE_URL ?>/index.php" aria-label="Accueil Vite &amp; Gourmand">Vite &amp; Gourmand</a>
        <ul>
            <li><a href="<?= BASE_URL ?>/index.php">Accueil</a></li>
            <li><a href="<?= BASE_URL ?>/pages/menus.php">Nos menus</a></li>
            <li><a href="<?= BASE_URL ?>/pages/contact.php">Contact</a></li>
            <?php if (isLoggedIn()): ?>
                <?php if (isAdmin()): ?>
                    <li><a href="<?= BASE_URL ?>/espace-admin/index.php">Espace Admin</a></li>
                <?php elseif (isEmploye()): ?>
                    <li><a href="<?= BASE_URL ?>/espace-employe/index.php">Espace Employé</a></li>
                <?php else: ?>
                    <li><a href="<?= BASE_URL ?>/espace-utilisateur/index.php">Mon espace</a></li>
                <?php endif; ?>
                <li><a href="<?= BASE_URL ?>/pages/deconnexion.php">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="<?= BASE_URL ?>/pages/connexion.php">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
