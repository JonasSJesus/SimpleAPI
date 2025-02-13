<?php

namespace controller;
use model\contato;

class create
{
    public function __construct(private contato $repo){}

    public function request()
    {
        $request = file_get_contents('php://input');
        $json = json_decode($request, true);

        $this->repo->add($json);
        http_response_code(201); 
    }
}
