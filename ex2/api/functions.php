<?php
function addEntry()
{
    $entries = array(
        array("id" => 1, "date" => "2024-02-23", "title" => "Premiere entree", "adventure" => "Recit de la premiere aventure"),
        array("id" => 2, "date" => "2024-02-24", "title" => "Deuxieme entree", "adventure" => "Recit de la deuxieme aventure")
    );

    // Récupère les données JSON envoyées dans la requête POST
    $data = json_decode(file_get_contents('php://input'), true);

    // Vérifier si toutes les données requises sont présentes
    if (isset($data['date']) && isset($data['title']) && isset($data['adventure'])) {
        // Ajouter une nouvelle entrée
        array_push($entries, array("id" => $data['id'], "date" => $data['date'], "title" => $data['title'], "adventure" => $data['adventure']));

        echo json_encode(array("message" => "Succès", "entries" => $entries));
    } else {
        // Données manquantes, renvoyer un message d'erreur
        http_response_code(400);
        echo json_encode(array("message" => "Une erreur est survenue."));
    }
}

function getEntries()
{
    // Réponse JSON
    $entries = array(
        array("id" => 1, "date" => "2024-02-23", "title" => "Premiere entree", "adventure" => "Recit de la premiere aventure"),
        array("id" => 2, "date" => "2024-02-24", "title" => "Deuxieme entree", "adventure" => "Recit de la deuxieme aventure")
    );
    echo json_encode($entries);
}
