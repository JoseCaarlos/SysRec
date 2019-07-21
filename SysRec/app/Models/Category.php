<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Neo4j\Neo4j;

class Category extends Neo4j
{
    public static function verificarCategoria($name)
    {
        $cypher_query = "MATCH (n:Category) WHERE n.name = '". $name ."' return n.name";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }
}
