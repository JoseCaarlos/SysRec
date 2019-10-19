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
        $cypher_query = "MATCH (n:Client) WHERE n.email = '". $user_name ."' and n.confirm_password = '". $password ."' return ID(n) as id, n.email as email, n.name as name";
        return Neo4j::conectar()->run($cypher_query);
    }

    public static function compraProduto($dados){
        $cypher_query = "match(c:Client),(o:Order{compra:1}),(p:Product), (c)-[:PURCHASED]->(o)-[:ORDERS]->(p)  where ID(p) = ". $dados['idProd']. " AND ID(c) = ". $dados['idCli']. " return p.name";
        var_dump($cypher_query);
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function verificaAvaliacao($dados){
        $cypher_query = "match(c:Client),(p:Product),(c)-[:RATING]->(p) where ID(c) = ". $dados['idCli'] ." AND ID(p) = ". $dados['idProd'] ." return p.name";
        var_dump($cypher_query);
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function gravaAvaliacao($rel, $dados)
    {
        
        $cypher_query = "match(c:Client),(p:Product) WHERE ID(c) = ".$dados['idCli'] ." and ID(p) = ". $dados['idProd'] ." 
        CREATE (c)-[ r: RATING {description: '". $rel['opiniao']."' , rating: ". $rel['avaliacao'] .", recommend: ". $rel['recomenda'] ."}]->(p)
        return *";
        return Neo4j::conectar()->run($cypher_query);
    }
}
