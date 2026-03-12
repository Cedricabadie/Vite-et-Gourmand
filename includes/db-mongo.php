<?php
/**
 * Connexion MongoDB (singleton)
 * Nécessite : composer require mongodb/mongodb
 */
function getMongoDB(): MongoDB\Database {
    static $db = null;
    if ($db === null) {
        $client = new MongoDB\Client(MONGO_URI);
        $db = $client->selectDatabase(MONGO_DB);
    }
    return $db;
}
