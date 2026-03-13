<?php
/**
 * Gestion de l'authentification et des sessions
 */

function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

function getCurrentUser(): ?array {
    if (!isLoggedIn()) return null;
    return $_SESSION['user'] ?? null;
}

function hasRole(string $role): bool {
    $user = getCurrentUser();
    return $user && $user['role'] === $role;
}

function isAdmin(): bool    { return hasRole('administrateur'); }
function isEmploye(): bool  { return hasRole('employe'); }
function isUtilisateur(): bool { return hasRole('utilisateur'); }

function requireAuth(): void {
    if (!isLoggedIn()) {
        header('Location: ' . BASE_URL . '/pages/connexion.php');
        exit;
    }
}

function requireRole(string $role): void {
    requireAuth();
    if (!hasRole($role)) {
        header('Location: ' . BASE_URL . '/index.php');
        exit;
    }
}
