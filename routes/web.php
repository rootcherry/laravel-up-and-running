<?php

use Illuminate\Support\Facades\Route;

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

// Definição de rota básica
Route::get('/', function () {
    return 'Hello, World!';
});

// Exemplo de site
Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

Route::get('products', function () {
    return view('products');
});

Route::get('/services', function () {
    return view('services');
});

// chamadas estaticas - evitar o uso de facades
$router->get('/', function () {
    return 'Hello, World!';
});

// Verbos de rota
Route::get('/', function () {
    return 'Hello, World!';
});

Route::post('/', function () {});
Route::put('/', function () {});
Route::delete('/', function () {});
Route::any('/', function () {});
Route::match(['get', 'post'], '/', function () {});

// Rotas chamando métodos de controlador
Route::get('/', 'WelcomeController@index');

// Parâmetros de rota
Route::get('users/{id}/friends', function ($id) {
    // todo
});

// parâmentros de rota e parâmentros de métodos
Route::get('users/{userId}/comments/{commentId}', function (
    $thisIsActuallyTheUserId,
    $thisIsReallyTheCommentId
    ) {
    //
});

// Parâmetros de rota opcionais
Route::get('users/{id?}', function ($id = 'fallbackId') {
    //
});

// Restrições de rota definidas em expressões regulares
Route::get('users/{id}', function ($id) {
    // todo
})->where('id', '[0-9]+');

Route::get('users/{username}', function ($username) {
    // todo
})->where('username', '[A-Za-z]+');

Route::get('posts/{id}/{slug}', function ($id, $slug) {
    // todo
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z]+']);
