<?php
class PirateService {
    public function trouverTresor($nomPirate) {
        switch ($nomPirate) {
            case 'Barbe Noire':
                return array('latitude' => 40.7128, 'longitude' => -74.0060, 'message' => 'Le trésor est caché à New York');
            case 'Jack Sparrow':
                return array('latitude' => 37.7749, 'longitude' => -122.4194, 'message' => 'Le trésor est caché à San Francisco');
            default:
                return array('latitude' => 0, 'longitude' => 0); // Coordonnées par défaut
        }
    }
}

// Créer le serveur SOAP
$server = new SoapServer("pirate.wsdl", array('trace' => 1));
$server->setClass("PirateService");
$server->handle();
?>
