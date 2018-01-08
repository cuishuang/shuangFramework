<?php
require_once "../vendor/autoload.php";

use Hprose\Swoole\Server;
use Hprose\Future;

$server = new Server("http://0.0.0.0:1315");
$server->setErrorTypes(E_ALL);
$server->setDebugEnabled();
$server->addFunction(function($a, $b) use ($server) {
    $promise = new Future();
    swoole_timer_after(1000, function() use($a, $b, $promise) {
        $promise->resolve($a + $b);
    });
    return $promise;
}, "sum");
$server->start();
