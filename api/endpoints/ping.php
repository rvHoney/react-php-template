<?php
// Instanciation du contrôleur
$pingController = new PingController();

// GET /ping
// Endpoint pour vérifier le fonctionnement de l'API
new Endpoint('GET', '/ping', function () use ($pingController) {
    $pingController->ping();
});

// GET /ping/{int}
// Endpoint pour vérifier le fonctionnement de l'API
new Endpoint('GET', '/ping/{int}', function ($matches) use ($pingController) {
    $pingController->pingInt($matches);
});

// GET /ping/{string}
// Endpoint pour vérifier le fonctionnement de l'API
new Endpoint('GET', '/ping/{string}', function ($matches) use ($pingController) {
    $pingController->pingString($matches);
});

// GET /ping/{bool}
// Endpoint pour vérifier le fonctionnement de l'API
new Endpoint('GET', '/ping/{bool}', function ($matches) use ($pingController) {
    $pingController->pingBool($matches);
});
?>