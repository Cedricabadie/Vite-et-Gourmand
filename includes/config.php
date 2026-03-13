<?php
// Configuration base de données MySQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'vite_et_gourmand');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Configuration MongoDB
define('MONGO_URI', 'mongodb://localhost:27017');
define('MONGO_DB', 'vite_et_gourmand_stats');

// Configuration mail
define('MAIL_HOST', '');
define('MAIL_PORT', 587);
define('MAIL_USER', '');
define('MAIL_PASS', '');
define('MAIL_FROM', 'contact@vite-et-gourmand.fr');
define('MAIL_FROM_NAME', 'Vite & Gourmand');

// Configuration application
define('BASE_URL', 'http://localhost/Vite-et-Gourmand');
define('BORDEAUX_CITY', 'bordeaux');
define('LIVRAISON_BASE', 5.00);       // Forfait livraison hors Bordeaux (€)
define('LIVRAISON_KM', 0.59);         // Supplément par km (€)
define('REDUCTION_SEUIL', 5);         // Personnes supplémentaires pour réduction
define('REDUCTION_TAUX', 0.10);       // 10% de réduction
define('DELAI_RETOUR_MATERIEL', 10);  // Jours ouvrés pour retour matériel
define('FRAIS_MATERIEL', 600.00);     // Frais si matériel non restitué (€)
