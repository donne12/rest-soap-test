<?php
header("Content-Type: application/json");

include 'functions.php';

// Route les requêtes vers les fonctions appropriées
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (strpos($_SERVER['REQUEST_URI'], '/carnet') !== false) {
        addEntry();
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Invalid content type or endpoint"));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Vérifie si l'URL contient '/carnet'
    if (strpos($_SERVER['REQUEST_URI'], '/carnet') !== false) {
        getEntries();
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Endpoint not found"));
    }
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Endpoint not found"));
}
?>
