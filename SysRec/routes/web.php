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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/produto", "HomeController@produto")->name("produto");

Route::get("/produtoDetalhe", "HomeController@produtoDetalhe")->name("produtoDetalhe");

Route::get('/graph', function () {

    $neo4j = Neo4j::Conectar();
    $query = 'MATCH (m:Supplier) RETURN m.contactName,m.address';
    $result = $neo4j->run($query);
    foreach ($result->getRecords() as $record) {
        // echo printf('Person name is : %s');
        print_r($record->value('m.contactName'). "<br>" . $record->value('m.address') . "<br><br>");
    }
    return null;
});