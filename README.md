# Vite & Gourmand

Application web de commande de menus traiteur pour l'entreprise **Vite & Gourmand** (Bordeaux).
Projet ECF – TP Développeur Web et Web Mobile – Studi | **Cédric Abadie**

---

## Stack technique

| Couche | Technologie |
|--------|-------------|
| Front  | HTML5, CSS3, JavaScript |
| Back   | PHP 8+ avec PDO |
| BDD relationnelle | MySQL / MariaDB |
| BDD NoSQL | MongoDB |
| Déploiement | (à définir : fly.io / Heroku / Azure) |

---

## Prérequis

- PHP 8.0+
- MySQL 8.0+ ou MariaDB 10.6+
- MongoDB 6.0+
- Composer
- Serveur web local (MAMP, XAMPP, Laragon, etc.)

---

## Installation locale

### 1. Cloner le dépôt

```bash
git clone https://github.com/Cedricabadie/Vite-et-Gourmand.git
cd Vite-et-Gourmand
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Configurer la base de données

Créer la base et importer le fichier SQL :

```bash
mysql -u root -p < database/vite_et_gourmand.sql
```

### 4. Configurer l'application

Copier et adapter le fichier de configuration :

```bash
cp includes/config.php includes/config.local.php
```

Modifier `includes/config.local.php` avec vos paramètres locaux (BDD, mail, MongoDB).

### 5. Lancer le serveur

Placer le projet dans le dossier `www` (XAMPP) ou `htdocs` (MAMP), puis accéder à :

```
http://localhost/Vite-et-Gourmand/
```

---

## Workflow Git

```
main
 └── develop
       ├── feature/auth
       ├── feature/menus
       ├── feature/commande
       ├── feature/espace-utilisateur
       ├── feature/espace-employe
       ├── feature/espace-admin
       ├── feature/contact
       ├── feature/pages-legales
       └── feature/database
```

- Chaque fonctionnalité est développée sur sa branche `feature/`
- Merge vers `develop` après tests
- Merge vers `main` pour la livraison finale

---

## Compte administrateur

À configurer dans `database/vite_et_gourmand.sql` avant le déploiement.
*(Le compte admin ne peut pas être créé depuis l'application)*

---

## Livrables ECF

- [ ] Lien dépôt GitHub public
- [ ] Lien application déployée
- [ ] Lien outil de gestion de projet (Notion/Trello/Jira)
- [ ] Manuel d'utilisation (PDF)
- [ ] Charte graphique + maquettes (PDF)
- [ ] Documentation technique
- [ ] Fichiers SQL (structure + données)