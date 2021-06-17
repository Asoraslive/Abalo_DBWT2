<?php


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Bloatless/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// require necessary files here


use Bloatless\WebSocket\Application\customServerApp;
use Bloatless\WebSocket\Application\DemoApplication;
use Bloatless\WebSocket\Application\StatusApplication;

include "vendor/autoload.php";
// create new server instance
$server = new \Bloatless\WebSocket\Server('127.0.0.1', 8080);

// Server settings:
$server->setMaxClients(100);
$server->setCheckOrigin(false);
$server->setAllowedOrigin('foo.lh');
$server->setMaxConnectionsPerIp(100);
$server->setMaxRequestsPerMinute(2000);

// Add your applications here:
$server->registerApplication('custom',customServerApp::getInstance());
$server->registerApplication('status',StatusApplication::getInstance());
$server->registerApplication('demo',DemoApplication::getInstance());
$server->run();
