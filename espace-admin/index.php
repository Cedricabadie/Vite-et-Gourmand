<?php
session_start();
require_once '../includes/config.php';
require_once '../includes/db.php';
require_once '../includes/auth.php';
require_once '../includes/functions.php';
require_once '../includes/db-mongo.php';
requireRole('administrateur');
// TODO: feature/espace-admin
