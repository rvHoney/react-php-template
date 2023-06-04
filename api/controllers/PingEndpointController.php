<?php
class PingEndpointController
{
    // Méthode pour vérifier le fonctionnement de l'API sans paramètres
    public function ping()
    {
        $data = [
            'message' => 'pong'
        ];
        ApiResponse::sendResponse(200, $data);
    }

    // Méthode pour vérifier le fonctionnement de l'API avec un paramètre int
    public function pingInt($int)
    {
        $data = [
            'message' => 'pong',
            'int' => $int
        ];
        ApiResponse::sendResponse(200, $data);
    }

    // Méthode pour vérifier le fonctionnement de l'API avec un paramètre string
    public function pingString($string)
    {
        $data = [
            'message' => 'pong',
            'string' => $string
        ];
        ApiResponse::sendResponse(200, $data);
    }

    // Méthode pour vérifier le fonctionnement de l'API avec un paramètre bool
    public function pingBool($bool)
    {
        $data = [
            'message' => 'pong',
            'bool' => $bool
        ];
        ApiResponse::sendResponse(200, $data);
    }
}