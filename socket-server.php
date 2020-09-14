<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'config/env.php';
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Socket\Options;

$server = IOServer::factory(
    new HttpServer(
        new WsServer(
            new Options()
        )
    ),
    8080
);

$server->run();
