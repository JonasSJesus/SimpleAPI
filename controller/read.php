<?php

namespace controller;
use model\contato;

class read
{
    public function __construct(private contato $repo){}

    public function request(): void
    {
        $ctt = $this->repo->read();

        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($ctt);
    }
}
