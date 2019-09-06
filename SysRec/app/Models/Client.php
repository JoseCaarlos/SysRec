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

    function autenticar($user_name, $password)
    {
        $cypher_query = "MATCH (n:Client) WHERE n.email = '". $user_name ."' and n.confirm_password = '". $password ."' return n.email";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function dados($user_name, $password)
    {
        $cypher_query = "MATCH (n:Client) WHERE n.email = '". $user_name ."' and n.confirm_password = '". $password ."' return n.email as email, n.name as name";
        return Neo4j::conectar()->run($cypher_query);
    }
}
