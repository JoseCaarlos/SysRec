<?php

namespace App\Models;
use App\Neo4j\Neo4j;

class Supplier extends Neo4j
{
    public static function verificarCategoria($cnpj)
    {
    $cypher_query = "MATCH (n:Supplier) WHERE n.cnpj = '". $cnpj ."' return n.cnpj";
    return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }
}
