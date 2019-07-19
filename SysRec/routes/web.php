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


// Rota administrativa
Route::get("/admin","AdminController@index")->name("admin");

Route::any("/painelAdmin","AdminController@autenticar")->name("adminPanel");

Route::get("/sairAdmin","AdminController@logout")->name("logout");


Route::get('/graph', function () {

    $prop = ([
        'infos' => ['name' => 'S7', 'Price' => 3600.00]
     ]);
     
    $prop2 = ([
        'infos' => ['first_name' => $request->get("first_name"),
                     'last_name' => $request->get("last_name"),
                     'cpf' => $request->get("cpf"),
                     'rg' => $request->get("rg"),
                     'sex' => $request->get("sex"),
                     'telephone' => $request->get("telephone"),
                     'phone_number' => $request->get("phone_numbere"),
                     'birth_date' => $request->get("birth_date"),
                     'state' => $request->get("state"),
                     'city' => $request->get("city"),
                     'postal_code' => $request->get("postal_code"),
                     'street' => $request->get("street"),
                     'street_number' => $request->get("street_number"),
                     'complement' => $request->get("complement"),
                     'email' => $request->get("email"),
                     ]
     ]);

     //name, cpf, rg, sex, telephone, phone_number,date_birth, address (o endereço deve conter: state, city, postal_code, street , street_number, complement), email.
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
    //$c = Neo4j::deleteNode($node,True);
      $neo4j = Neo4j::conectar();
      $query = 'MATCH (m:Cliente) RETURN m,m.name as name';
      $c = $neo4j->run($query);
      foreach ($c->getRecords() as $record) {
         print_r($record->get('m'));
         echo $record->value('name') . PHP_EOL;

         echo"<br>";
      }
      return null;
});