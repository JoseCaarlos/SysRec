<?php

namespace App\Models;

use App\Neo4j\Neo4j;

class Product extends Neo4j
{

        public static function createNodeProductProperty($node, $property, $rel)
        {
                Neo4j::conectar()->run('CREATE (n:' . $node . ') SET n += {infos}
                                    WITH n
                                    MATCH(m:Category)
                                    WHERE ID(m) = ' . $rel['idOne'] . '
                                    CREATE (n)-[:PART_OF]->(m)
                                    WITH n
                                    MATCH(s:Supplier)
                                    WHERE ID(s) = ' . $rel['idTwo'] . '
                                    CREATE (n)<-[:SUPPLIES]-(s)
                                    RETURN *', $property);
        }
}
