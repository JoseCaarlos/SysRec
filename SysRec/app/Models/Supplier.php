<?php

namespace App\Models;

use App\Neo4j\Neo4j;

class Supplier extends Neo4j
{
    public static function verificarCategoria($cnpj)
    {
        $cypher_query = "MATCH (n:Supplier) WHERE n.cnpj = '" . $cnpj . "' return n.cnpj";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function supplierAll()
    {
        $cypher_query = "MATCH (s:Supplier) return  ID(s) as id, s.name as name";
        return Neo4j::conectar()->run($cypher_query);
    }

    //Seleciona Node pelo ID, retornando tudo
    public static function matchNodeId($name, $id)
    {
        $result =  Neo4j::conectar()->run('MATCH (n:' . $name . ') where ID(n) = ' . $id . ' return ID(n) as id, n.city as city, n.street as street, n.street_number as street_number, n.name as name, n.telephone as telephone, n.phone_number as phone_number, n.neighborhood as neighborhood, n.cnpj as cnpj, n.state as state, n.postal_code as postal_code, n.email as email');
        return $result;
    }
}
