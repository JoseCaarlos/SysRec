<?php

namespace App\Neo4j;
use GraphAware\Neo4j\Client\ClientBuilder;

class Neo4j 
{
    
    public static function conectar()
    {
        /* AddConnection: 'http://senha@servidor:porta'
         *
         */ 
        $neo4j = ClientBuilder::create()
            ->addConnection('http', 'http://neo4j:1234@localhost:7474')
            ->build();

        return $neo4j;
    }

    //Cria um node Vazio
    public static function createNodeEmpty($name){
        Neo4j::conectar()->run('CREATE (n:'.$name.')');
    }

    //Cria um node com suas propriedades
    public static function createNodeProperty($node,$property){
        Neo4j::conectar()->run('CREATE (n:'.$node.') SET n += {infos}', $property);
    }

    //Criando relacionamento com os nodes
    public static function createRelationship($nodeStart){
        $result = Neo4j::conectar()->run('MATCH (m:'.$nodeStart['Node'].'{name:"'.$nodeStart['Id'].'"}),
                                         (n:'.$nodeStart['NodeTwo'].'{name:"'.$nodeStart['IdTwo'].'"})
                                         CREATE (m)-[r:'.$nodeStart['Rel'].']->(n)
                                         RETURN m,n,r');
        return $result;
    }
    //Recomendação baseado em algum cliente passado
    public static function collaborativeFiltration($node){
        $result = Neo4j::conectar()->run('MATCH (m:'.$node['Node'].'{name:"'.$node['Id'].'"})-[:COMPROU]->()<-[:COMPROU]-(n:Cliente),
                                         (n:Cliente)-[:COMPROU]->(k)
                                         RETURN  k.name');
        return $result;
    }
    //Deleção de algum node, caso queira apagar os relacionamentos passa-se 2 param como True.
    public static function deleteNode($node,$bool){
        $detach = $bool ? "DETACH": "";
        Neo4j::conectar()->run('MATCH (m:'.$node['Node'].'{name:"'.$node['Id'].'"}) 
                               '.$detach.' DELETE m');
    }

}

?> 