<?php
/**
 * Created by PhpStorm.
 * User: shuangcui
 * Date: 2018/1/8
 * Time: 上午10:04
 */

use Dashen\Cui\Server\HttpServer;

date_default_timezone_set('Asia/Shanghai');
define('BASE_DIR',dirname(__DIR__));


require  BASE_DIR.'/vendor/autoload.php';

$config = require BASE_DIR.'/config/config.php';
$router = require BASE_DIR.'/config/router.php';

require BASE_DIR."/src/Dashen/Cui/Server/HttpServer.php";

if (isset($argv[1]) && $argv[1] == '-p' && isset($argv[2])){
    HttpServer::getInstance($argv[2]);
}else{
    Http:getInstance(6666);
}