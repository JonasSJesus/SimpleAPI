<?php

$url = '/api/test/';
$uri = trim($url, '/');
$segmentos = explode('/', $uri);

var_dump($segmentos);
