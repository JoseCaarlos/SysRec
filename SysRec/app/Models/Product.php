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

        public static function matchNodeProduct($name)
        {
                $result =  Neo4j::conectar()->run('MATCH (n:' . $name . ') return n.name as name,
                id(n) as id, n.path_file as file, n.sales_price as price');
                return $result;
        }

        //Filtrando por Categoria
        public static function matchNodeProductCat($name, $id)
        {
                $result =  Neo4j::conectar()->run('MATCH (n:' . $name . '),(c:Category),(n)-[:PART_OF]->(c) where ID(c) = ' . $id . '  return n.name as name,
                id(n) as id, n.path_file as file, n.sales_price as price ');
                return $result;
        }

        //Seleciona Node pelo ID, retornando tudo
        public static function matchNodeId($name, $id)
        {
                $result =  Neo4j::conectar()->run('MATCH (n:' . $name . '),(n)-[:PART_OF]->(k) where ID(n) = ' . $id . ' return ID(n) as id, n.path_file as file,n.name as name, n.sales_price as price, n.describ as describ, k.name as category, ID(k) as catId');
                return $result;
        }

        //Relacionados seleciona Node pelo ID, retornando tudo
        public static function matchNodeRel($id)
        {
                $result =  Neo4j::conectar()->run('MATCH (p:Product),(p)-[:PART_OF]->(c),(c)<-[:PART_OF]-(p2) where ID(p) = '.$id.' return p2.path_file as file,p2.name as name, p2.sales_price as price, p2.describ as describ, ID(p2) as id');
                return $result;
        }

        public static function matchNodePrice($inf, $sup){
                $result = Neo4j::conectar()->run('match(n:Product) where n.sales_price > "'.$inf.'" and n.sales_price < "'.$sup.'" return ');
        }
}
