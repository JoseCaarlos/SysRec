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
    
    // Cria um node Vazio
    public static function createNodeEmpty($name){
        Neo4j::conectar()->run('CREATE (n:'.$name.')');
    }

    // Cria um node com suas propriedades
    public static function createNodeProperty($node,$property){
        Neo4j::conectar()->run('CREATE (n:'.$node.') SET n += {infos}', $property);
    }

    // Seleciona o node retornando nome e id
    public static function matchNode($name){
    $result =  Neo4j::conectar()->run('MATCH (n:'.$name.') return n.name as name,id(n) as id');
            return $result;
    }

    // Criando relacionamento com os nodes
    public static function createRelationship($node){
        $result = Neo4j::conectar()->run('MATCH (m:'.$node['Node'].'{name:"'.$node['Id'].'"}),
                                         (n:'.$node['NodeTwo'].')
                                         WHERE ID(n)='.$node['nodeTwo'].'
                                         CREATE (m)-[r:'.$node['Rel'].']->(n)
                                         RETURN m,n,r');
        return $result;
    }

    // Recomendação baseado em algum cliente passado
    public static function collaborativeFiltration($node){
        $result = Neo4j::conectar()->run('MATCH (m:'.$node['Node'].'{name:"'.$node['Id'].'"})-[:PURCHASED]->()<-[:PURCHASED]-(n:Client),
                                         (n:Client)-[:PURSHASED]->(k)
                                         RETURN  k.name');
        return $result;
    }
    
    // Deleção de algum node, caso queira apagar os relacionamentos passa-se 2 param como True.
    public static function deleteNode($node,$bool){
        $detach = $bool ? "DETACH": "";
        Neo4j::conectar()->run('MATCH (n:'.$node['Node'].') where ID(n) = '.$node['Id'].' 
                               '.$detach.' DELETE n');
    }

    public static function createNodeProductProperty($node,$property,$rel){
        Neo4j::conectar()->run('CREATE (n:'.$node.') SET n += {infos}
                                WITH n
                                MATCH(m:Category)
                                WHERE ID(m) = '.$rel['idOne'].'
                                CREATE (n)-[:PART_OF]->(m)
                                with n
                                MATCH(s:supplier)
                                WHERE ID(s) = '.$rel['idTwo'].'
                                CREATE (n)<-[:SUPPLIES]-(s)
                                RETURN *', $property);
    }

}

?> 