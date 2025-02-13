<?php

namespace controller;
use model\contato;

class delete
{
    public function __construct(private contato $repo){}

    public function request(): void
    {
        $input = file_get_contents('php://input');
        $idJson = json_decode($input, true);

        http_response_code(204);
        $this->repo->delete($idJson['id']);
    }
}