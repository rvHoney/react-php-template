<?php
// Requêtes CROSS-ORIGIN
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Content-Type: application/json; charset=utf-8');

// Configuration de l'API
define('API_PREFIX', '/api');
// Fichier de configuration pour la base de données (SQLite3)
define('DB_PATH', 'data/database.db')
?>