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
        //var_dump($cypher_query);
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function verificaAvaliacao($dados){
        $cypher_query = "match(c:Client),(p:Product),(c)-[:RATING]->(p) where ID(c) = ". $dados['idCli'] ." AND ID(p) = ". $dados['idProd'] ." return p.name";
        //var_dump($cypher_query);
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function gravaAvaliacao($rel, $dados)
    {
        
        $cypher_query = "match(c:Client),(p:Product) WHERE ID(c) = ".$dados['idCli'] ." and ID(p) = ". $dados['idProd'] ." 
        CREATE (c)-[ r: RATING {description: '". $rel['opiniao']."' , rating: ". $rel['avaliacao'] .", recommend: ". $rel['recomenda'] ."}]->(p)
        return *";
        return Neo4j::conectar()->run($cypher_query);
    }

    public static function cosineSimilarity($id)
    {
        
        $cypher_query = "MATCH (p1:Client),(p2:Client) where ID(p1) = ".$id." and ID(p2) <> ".$id."
                            WITH p1,p2
                            MATCH (p1)-[x:RATING]->(p:Product)<-[y:RATING]-(p2:Client)
                            WITH COUNT(p) AS numberProduct, SUM(x.rating * y.rating) AS xyDotProduct,
                            SQRT(REDUCE(xDot = 0.0, a IN COLLECT(x.rating) | xDot + a^2)) AS xLength,
                            SQRT(REDUCE(yDot = 0.0, b IN COLLECT(y.rating) | yDot + b^2)) AS yLength,
                            p1, p2 WHERE numberProduct > 0
                            RETURN p1.first_name, ID(p2) as recom, xyDotProduct / (xLength * yLength) AS sim
                            ORDER BY sim DESC
                            LIMIT 1";
        return Neo4j::conectar()->run($cypher_query);
    }


}
