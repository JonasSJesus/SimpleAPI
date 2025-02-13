<?php

namespace controller;

use model\contato;

class update
{
    public function __construct(private contato $repo){}

    public function request()
    {
        $input = file_get_contents('php://input');
        $json = json_decode($input, true);

        http_response_code(201);
        $this->repo->update($json);
    }
}