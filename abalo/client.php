<?php
include "vendor/autoload.php";

$client = new \Bloatless\WebSocket\Client;
$client->connect('127.0.0.1', 8080, '/custom', 'foo.lh');
$client->sendData(json_encode([
    'action' => 'maintanance',
    'data' => 'start'
]));
