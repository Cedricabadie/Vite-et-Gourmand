<?php
/**
 * Fonctions utilitaires
 */

/**
 * Échappe les données pour affichage sécurisé (XSS)
 */
function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Calcule le prix de livraison selon la ville
 */
function calculerPrixLivraison(string $ville, float $distanceKm = 0): float {
    if (strtolower(trim($ville)) === BORDEAUX_CITY) {
        return 0.0;
    }
    return LIVRAISON_BASE + ($distanceKm * LIVRAISON_KM);
}

/**
 * Calcule le prix total d'une commande avec réduction éventuelle
 */
function calculerPrixCommande(float $prixBase, int $nbPersonnes, int $nbMinimum): float {
    $prix = $prixBase * ($nbPersonnes / $nbMinimum);
    if ($nbPersonnes >= $nbMinimum + REDUCTION_SEUIL) {
        $prix *= (1 - REDUCTION_TAUX);
    }
    return round($prix, 2);
}

/**
 * Valide la force d'un mot de passe (min 10 car., 1 maj, 1 min, 1 chiffre, 1 spécial)
 */
function validerMotDePasse(string $mdp): bool {
    return strlen($mdp) >= 10
        && preg_match('/[A-Z]/', $mdp)
        && preg_match('/[a-z]/', $mdp)
        && preg_match('/[0-9]/', $mdp)
        && preg_match('/[\W_]/', $mdp);
}

/**
 * Redirige vers une URL
 */
function redirect(string $url): void {
    header('Location: ' . $url);
    exit;
}
