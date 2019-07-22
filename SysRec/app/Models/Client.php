<?php

namespace App\Models;
use App\Neo4j\Neo4j;

class Client extends Neo4j
{
    public static function verificarCpf($cpf)
    {
    $cypher_query = "MATCH (n:Client) WHERE n.cpf = '". $cpf ."' return n.cpf";
    return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }
}
