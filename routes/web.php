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

Route::get('/categorias', function () {
    $cats = DB::table('categorias')->get();

    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<hr />";

    $nome = DB::table('categorias')->pluck('nome');

    foreach($nome as $nome){
        echo $nome." <br />";
    }

    echo "<hr />";

    $cats = DB::table('categorias')->where('id', 1)->get();

    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<hr />";

    $cats = DB::table('categorias')->where('id', 1)->first();
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";

    echo "<p>Retorna um array utilizando Like</p>";

    $cats = DB::table('categorias')->where('nome', 'like', '%p')->get();
    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<p>Sentenças Lógicas</p>";

    $cats = DB::table('categorias')->where('id', 1)->orWhere('id', 2)->get();
    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<p>Intervalos</p>";

    $cats = DB::table('categorias')->WhereBetween('id', [1,4])->get();
    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<p>Que não estão no intervalo</p>";

    $cats = DB::table('categorias')->WhereNotBetween('id', [1,4])->get();
    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<p>Que estão no conjunto indicado</p>";

    $cats = DB::table('categorias')->WhereIn('id', [1,3,4])->get();
    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<p>Sentenças Lógicas 2</p>";

    $cats = DB::table('categorias')->where([
        ['id', 1],
        ['nome', 'roupas']
    ])->get();
    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<p>Ordenando por nome por ordem crescente</p>";

    $cats = DB::table('categorias')->orderBy('nome')->get();
    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<p>Ordenando por nome decrescente</p>";

    $cats = DB::table('categorias')->orderBy('nome', 'desc')->get();
    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }


});

//Inserção de registros

Route::get('/novasCategorias', function() {
    $id = DB::table('categorias')->insertGetId(
        ['nome'=>'Carros']
    );

    echo "Novo ID = ".$id;
});

//Atualização de registros

Route::get('/atualizandoCategorias', function() {
    $cat = DB::table('categorias')->where('id', 1)->first();

    echo "<p>Antes da atualização</p>";
    echo "id: ".$cat->id.", ";
    echo "Nome; ".$cat->nome."<br />";

    $cat = DB::table('categorias')->where('id', 1)->update(['nome'=>'Roupas infantis']);

    $cat = DB::table('categorias')->where('id', 1)->first();
    echo "<p>Depois da atualização</p>";
    echo "id: ".$cat->id.", ";
    echo "Nome; ".$cat->nome."<br />";

});

Route::get('/removendoCategorias', function() {
    $cats = DB::table('categorias')->get();

    foreach($cats as $cat){
        echo "id: ".$cat->id.";";
        echo "Nome: ".$cat->nome."<br />";
    }

    echo "<hr />";

    $cat = DB::table('categorias')->where('id', 1)->update(['nome'=>'Roupas infantis']);

    $cat = DB::table('categorias')->where('id', 1)->first();
    echo "<p>Depois da atualização</p>";
    echo "id: ".$cat->id.", ";
    echo "Nome; ".$cat->nome."<br />";

});

