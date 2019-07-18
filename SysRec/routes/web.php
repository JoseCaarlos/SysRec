<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get("/produto", "HomeController@produto")->name("produto");

Route::get("/produtoDetalhe", "HomeController@produtoDetalhe")->name("produtoDetalhe");

Route::get("/sobre", "HomeController@about")->name("about");

Route::get("/contato","HomeController@contact")->name("contact");

Route::get("/carrinho","HomeController@cart")->name("cart");

Route::get("/cliente","HomeController@client")->name("client");

Route::get("/registrar","HomeController@register")->name("register");

Route::post("/registrarCliente","ClientController@register")->name("clientRegister");

Route::get('/graph', function () {

    $prop = ([
        'infos' => ['name' => 'S7', 'Price' => 3600.00]
     ]);
     
    $prop2 = ([
        'infos' => ['name' => 'Jose', 'age' => 18]
     ]);
     $where = ([
        'Node' => 'Cliente',
        'Id' => 'teste',
        'NodeTwo' => 'Produto',
        'IdTwo' => 'Iphone 7',
        'Rel' => 'COMPROU'

     ]);

     $recom = ([
        'Node' => 'Cliente',
        'Id' => 'Elias',
     ]);

     $node = ([
        'Node' => 'Cliente',
        'Id' => 'teste',
     ]);
    //$r = Neo4j::createNodeProperty("Produto",$prop);
    //$s = Neo4j::createNodeProperty("Cliente",$prop2);
    //$c = Neo4j::createRelationship($where);
    //$c = Neo4j::collaborativeFiltration($recom);
    $c = Neo4j::deleteNode($node,True);
    // $neo4j = Neo4j::conectar();
    // $query = 'MATCH (m:Client) RETURN m.name';
    // $result = $neo4j->run($query);
    foreach ($c->getRecords() as $record) {
        print_r($record->value('k.name'));
        echo"<br>";
    }
    return null;
});