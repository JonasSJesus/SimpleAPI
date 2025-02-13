<?php

use controller\create;
use controller\read;
use controller\update;
use controller\delete;
use model\contato;

require_once 'vendor/autoload.php';
require_once 'config.php';

$cttRepo = new contato($pdo);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$key = "$method|$uri";
$controller = '';


switch ($key) {
    case 'GET|/contatos':
        $controller = new read($cttRepo);
        break;
    case 'POST|/inserir':
        $controller = new create($cttRepo);
        break;
    case 'PUT|/editar':
        $controller = new update($cttRepo);
        break;
    case 'DELETE|/deletar':
        $controller = new delete($cttRepo);
        break;
    default:
        http_response_code(404);
        break;
}

if (is_object($controller)) {
    $controller->request();
}