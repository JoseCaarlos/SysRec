<?php

namespace App\Neo4j;
use GraphAware\Neo4j\Client\ClientBuilder;

class Neo4j 
{
    
    public static function Conectar()
    {
        /* AddConnection: 'http://senha@servidor:porta'
         *
         */ 
        $neo4j = ClientBuilder::create()
            ->addConnection('http', 'http://neo4j:1234@localhost:7474')
            ->build();

        return $neo4j;
    }

}

?>