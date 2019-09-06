<?php

namespace App\Models;
use App\Neo4j\Neo4j;

class Order extends Neo4j
{
    public static function createNodeOrderProperty($property, $rel)
    {
            Neo4j::conectar()->run('CREATE (n:Pedido) SET n += {infos}
                                WITH n
                                MATCH(c:Client)
                                WHERE ID(c) = ' . $rel['idOne'] . '
                                CREATE (c)-[:PURCHASED]->(n)
                                RETURN *', $property);
    }
}
