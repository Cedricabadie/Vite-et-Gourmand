-- =============================================
-- Vite & Gourmand – Base de données relationnelle
-- MySQL / MariaDB
-- =============================================

CREATE DATABASE IF NOT EXISTS vite_et_gourmand
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE vite_et_gourmand;

-- Table des rôles
CREATE TABLE IF NOT EXISTS role (
    role_id   INT AUTO_INCREMENT PRIMARY KEY,
    libelle   VARCHAR(50) NOT NULL
);

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS utilisateur (
    utilisateur_id  INT AUTO_INCREMENT PRIMARY KEY,
    email           VARCHAR(255) NOT NULL UNIQUE,
    password        VARCHAR(255) NOT NULL,  -- bcrypt
    nom             VARCHAR(50)  NOT NULL,
    prenom          VARCHAR(50)  NOT NULL,
    telephone       VARCHAR(20),
    adresse         VARCHAR(255),
    ville           VARCHAR(100),
    code_postal     VARCHAR(10),
    role_id         INT NOT NULL DEFAULT 3,  -- 3 = utilisateur
    actif           TINYINT(1) NOT NULL DEFAULT 1,
    created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);

-- Table des thèmes de menu
CREATE TABLE IF NOT EXISTS theme (
    theme_id  INT AUTO_INCREMENT PRIMARY KEY,
    libelle   VARCHAR(50) NOT NULL
);

-- Table des régimes alimentaires
CREATE TABLE IF NOT EXISTS regime (
    regime_id INT AUTO_INCREMENT PRIMARY KEY,
    libelle   VARCHAR(50) NOT NULL
);

-- Table des allergènes
CREATE TABLE IF NOT EXISTS allergene (
    allergene_id INT AUTO_INCREMENT PRIMARY KEY,
    libelle      VARCHAR(50) NOT NULL
);

-- Table des menus
CREATE TABLE IF NOT EXISTS menu (
    menu_id              INT AUTO_INCREMENT PRIMARY KEY,
    titre                VARCHAR(255) NOT NULL,
    description          TEXT,
    nombre_personne_min  INT NOT NULL DEFAULT 1,
    prix_par_personne    DOUBLE NOT NULL,
    theme_id             INT,
    conditions           TEXT,
    quantite_restante    INT,
    actif                TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (theme_id) REFERENCES theme(theme_id)
);

-- Table menu ↔ régime (N:N)
CREATE TABLE IF NOT EXISTS menu_regime (
    menu_id   INT NOT NULL,
    regime_id INT NOT NULL,
    PRIMARY KEY (menu_id, regime_id),
    FOREIGN KEY (menu_id)   REFERENCES menu(menu_id),
    FOREIGN KEY (regime_id) REFERENCES regime(regime_id)
);

-- Table des plats
CREATE TABLE IF NOT EXISTS plat (
    plat_id   INT AUTO_INCREMENT PRIMARY KEY,
    nom       VARCHAR(255) NOT NULL,
    type_plat ENUM('entree', 'plat', 'dessert') NOT NULL,
    photo     BLOB
);

-- Table plat ↔ allergène (N:N)
CREATE TABLE IF NOT EXISTS plat_allergene (
    plat_id      INT NOT NULL,
    allergene_id INT NOT NULL,
    PRIMARY KEY (plat_id, allergene_id),
    FOREIGN KEY (plat_id)      REFERENCES plat(plat_id),
    FOREIGN KEY (allergene_id) REFERENCES allergene(allergene_id)
);

-- Table menu ↔ plat (N:N)
CREATE TABLE IF NOT EXISTS menu_plat (
    menu_id INT NOT NULL,
    plat_id INT NOT NULL,
    PRIMARY KEY (menu_id, plat_id),
    FOREIGN KEY (menu_id) REFERENCES menu(menu_id),
    FOREIGN KEY (plat_id) REFERENCES plat(plat_id)
);

-- Table des images de menu (galerie)
CREATE TABLE IF NOT EXISTS menu_image (
    image_id  INT AUTO_INCREMENT PRIMARY KEY,
    menu_id   INT NOT NULL,
    chemin    VARCHAR(255) NOT NULL,
    FOREIGN KEY (menu_id) REFERENCES menu(menu_id)
);

-- Table des commandes
CREATE TABLE IF NOT EXISTS commande (
    commande_id       INT AUTO_INCREMENT PRIMARY KEY,
    numero_commande   VARCHAR(50) NOT NULL UNIQUE,
    utilisateur_id    INT NOT NULL,
    menu_id           INT NOT NULL,
    date_prestation   DATE NOT NULL,
    heure_prestation  VARCHAR(10),
    adresse_livraison VARCHAR(255),
    ville_livraison   VARCHAR(100),
    nombre_personnes  INT NOT NULL,
    prix_menu         DOUBLE NOT NULL,
    prix_livraison    DOUBLE NOT NULL DEFAULT 0,
    prix_total        DOUBLE NOT NULL,
    statut            VARCHAR(50) NOT NULL DEFAULT 'en attente',
    pret_materiel     TINYINT(1) NOT NULL DEFAULT 0,
    motif_annulation  TEXT,
    mode_contact      VARCHAR(50),
    created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id),
    FOREIGN KEY (menu_id)        REFERENCES menu(menu_id)
);

-- Table de suivi des statuts de commande
CREATE TABLE IF NOT EXISTS commande_statut (
    statut_id    INT AUTO_INCREMENT PRIMARY KEY,
    commande_id  INT NOT NULL,
    statut       VARCHAR(50) NOT NULL,
    changed_at   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (commande_id) REFERENCES commande(commande_id)
);

-- Table des avis clients
CREATE TABLE IF NOT EXISTS avis (
    avis_id      INT NOT NULL,
    utilisateur_id INT NOT NULL,
    commande_id  INT NOT NULL,
    note         TINYINT NOT NULL CHECK (note BETWEEN 1 AND 5),
    description  VARCHAR(500),
    statut       ENUM('en_attente', 'valide', 'refuse') NOT NULL DEFAULT 'en_attente',
    created_at   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id),
    FOREIGN KEY (commande_id)    REFERENCES commande(commande_id)
);

-- Table des horaires
CREATE TABLE IF NOT EXISTS horaire (
    horaire_id     INT AUTO_INCREMENT PRIMARY KEY,
    jour           VARCHAR(20) NOT NULL,
    heure_ouverture VARCHAR(10),
    heure_fermeture VARCHAR(10)
);

-- =============================================
-- Données initiales
-- =============================================

INSERT INTO role (libelle) VALUES ('administrateur'), ('employe'), ('utilisateur');

INSERT INTO theme (libelle) VALUES ('Noel'), ('Pâques'), ('Classique'), ('Évènement');

INSERT INTO regime (libelle) VALUES ('Végétarien'), ('Vegan'), ('Classique'), ('Sans gluten'), ('Sans lactose');

INSERT INTO horaire (jour, heure_ouverture, heure_fermeture) VALUES
('Lundi',    '09:00', '18:00'),
('Mardi',    '09:00', '18:00'),
('Mercredi', '09:00', '18:00'),
('Jeudi',    '09:00', '18:00'),
('Vendredi', '09:00', '18:00'),
('Samedi',   '10:00', '16:00'),
('Dimanche', NULL,    NULL);

-- Compte administrateur (José) – mot de passe à changer en production
-- password_hash('Admin@ViteGourmand1', PASSWORD_BCRYPT)
INSERT INTO utilisateur (email, password, nom, prenom, role_id) VALUES
('admin@vite-et-gourmand.fr', '$2y$10$PLACEHOLDER_HASH', 'Administrateur', 'José', 1);
