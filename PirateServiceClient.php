<?php
class MySoapClient extends SoapClient {
    public $lastRequest;
    public $lastResponse;

    #[\ReturnTypeWillChange]
    public function __doRequest($request, $location, $action, $version, $one_way = 0) {
        $this->lastRequest = $request;
        $this->lastResponse = parent::__doRequest($request, $location, $action, $version, $one_way);
        return $this->lastResponse;
    }
}

// Créer un client SOAP
$client = new MySoapClient("pirate.wsdl", array('cache_wsdl' => WSDL_CACHE_NONE, 'trace' => 1));

// Appeler la fonction trouverTresor
$client->trouverTresor('Barbe Noire'); 

$lastResponse = $client->lastResponse;

//display the xml
echo $lastResponse;
?>
