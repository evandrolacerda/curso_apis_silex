<?php

require_once __DIR__ . '/../bootstrap.php';

use Symfony\Component\HttpFoundation\Response;

$response = new Response();

$app->get('/clientes', function() use($response) {
    $clientes = [
        ['nome' => 'João da Silva', 'email' => 'joao.silva@example.com', 'cpf_cnpj' => '111.111.111-00'],
        ['nome' => 'Joaquim da Silva', 'email' => 'joaquim.silva@example.com', 'cpf_cnpj' => '222.222.222-11'],
        ['nome' => 'Pedro da Silva', 'email' => 'pedro.silva@example.com', 'cpf_cnpj' => '333.333.333-22'],
        ['nome' => 'Antônio da Silva', 'email' => 'antonio.silva@example.com', 'cpf_cnpj' => '444.444.444-33'],
        ['nome' => 'Mario da Silva', 'email' => 'mario.silva@example.com', 'cpf_cnpj' => '555.555.555-44'],
    ];
    
    return $response->setContent(json_encode($clientes));
});



$app->run();
