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

// Nomes de rotas - helper url()
// <a href=" <?php echo url('/'); ?> ">
<!-- // exibe <a href="http://myapp.com/">
 -->
// Definindo nomes de rotas
<!-- Definindo uma rota com nome em routers/web.php; -->
Route::get('members/{id}', 'MembersController@show')->name('members.show');

<!-- Vincula a rota em uma view usando o helper route() -->
<!-- <a hre="<?php echo route('members.show', ['id' => 14]); ?>"> -->

<!-- Definindo rotas personalizadas no Laravel -->

Route::get('members/{id}', [
    'as' => 'members.show',
    'uses' => 'MembersController@show'
]);

<!-- Passando parâmetros de rota para o helper route() -->
<!-- opção 1: -->

route('users.comments.show', [1, 2])
<!-- http://myapp.com/users/1/comments/2 -->

route('users.comments.show', ['userId' => 1, 'commentId' => 2])

route('users.comments.show', ['commentId' => 2, 'userId' => 1])

route('users.comments.show', ['userId', => 1, 'commentId' => 2, 'opt' => 'a'])
<!-- http://myapp.com/users/1/comments/2?opt=a -->

Grupos de rotas
Route::group([], function() {
    Route::get('hello', function() {
        return 'Hello';
    });
    Route::get('world', function() {
        return 'World';
    });
});

middleware

<!-- Restringindo um grupo de rotas apenas a usuarios que fizeram login -->
Route::gropu(['middleware' => 'auth'], function() {
    Route::get('dashboard', function() {
        return view('dashboard');
    });
    Route::get('account', function() {
        return view('account');
    });
});

<!-- Aplicando o middleware em controladores -->
class DashboardController extends Controller {
    public function_construct() {
        this->middleware('auth');
        this->middleware('admin-auth')->only('admin');
        this->middleware('team-member')->except('admin');
    }
}

Prefixos de caminho

<!-- Prefixando um grupo de rotas -->
Route::group(['prefix' => 'api'], function() {
    Route::get('/', function() {
        <!-- Manipula o caminho /api  -->
    });
    Route::get('users', function() {
        <!-- Manipula o caminho /api/users -->
    });
});

Roteamento de subdomínio

Route::group(['domain' => 'api.myapp.com'], function() {
    Route::get('/', function() {
        <!-- -->
    });
});

Roteamento de domínio parametrizado

Route::group(['domain' => '{account}.myapp.com'], function() {
    Route::get('/', function($account) {

    });
    Route::get('users/{id}', function($account, $id) {
        <!-- -->
    });
});

Prefixos de namespace

<!-- Prefixo de namespace para grupos de rotas -->
// App\Http\Controllers\ControllerA

Route::get('/', 'ControllerA@index');

Route::group(['namespace' => 'API'], function() {
    // App\Http\Controllers\API\ControllerB@index');
});

Prefixos de nome

Route::group(['as' => 'users.', 'prefix' => 'users'], function() {
    Route::group(['as' => 'comments.', 'prefix' => 'comments'], function() {
        <!-- O nome da rota será users.comments.show -->
        Route::get('{id}', function() {
            <!-- -->
        })->name('show');
    });
});

