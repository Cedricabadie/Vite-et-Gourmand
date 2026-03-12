<?php
/**
 * API – Filtrage dynamique des menus (AJAX)
 * Retourne du JSON
 */
session_start();
require_once '../includes/config.php';
require_once '../includes/db.php';
header('Content-Type: application/json');
// TODO: feature/menus
echo json_encode([]);
