<?php
use App\Models\MenuModel;

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

use Illuminate\Support\Facades\Route;

$prefixNews  = config('zvn.url.prefix_news');

Route::get('', [ 'as' => 'HomeController', 'uses' => 'News\HomeController@' . 'index' ]);

Route::group(['prefix' => $prefixNews, 'namespace' => 'News'], function () {

    // ============================== HOMEPAGE ==============================
    $prefix         = '';
    $controllerName = 'home';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('/not-found',                    [ 'as' => $controllerName. '/not-found',                  'uses' => $controller . 'notFound' ]);
    });

    // ====================== ARTICLE ========================
    $prefix         = 'bai-viet';
    $controllerName = 'article';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('/list-blog.html',  
        [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);

         Route::get('{article_slug}.html',
         [ 'as' => $controllerName . '/detail', 'uses' => $controller . 'detail' ])
         ->where('article_slug', '[0-9a-zA-Z_-]+');

/*        Route::get('/blog.html',
        [ 'as' => $controllerName . '/detail', 'uses' => $controller . 'detail' ]);*/

    });

    // ====================== Category page ========================
    // $prefix         = 'danh-muc-san-pham/';
    $prefix         = '';
    $controllerName = 'category';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('/all-food.html', [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);
        Route::get('{category_slug}.html', [ 'as' => $controllerName . '/list', 'uses' => $controller . 'list' ]);

        // Route::get('{category_name}-{category_id}.html',
        //     [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);

        /*         Route::get('/{product_name}-{product_id}.html',
         [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
         ->where('product_name', '[0-9a-zA-Z_-]+')
         ->where('product_id', '[0-9]+');*/

    });

    // ====================== Product page ========================
    $prefix         = 'san-pham';
    $controllerName = 'product';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        Route::get('/{product_slug}.html',
        [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
        ->where('product_slug', '[0-9a-zA-Z_-]+');

        Route::get('modal-image/{product_id}', 
        ['as' => $controllerName . '/modal', 'uses' => $controller . 'get_image_modal'])->where('id', '[0-9]+');

        // Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');

    });

    // ============================== NOTIFY ==============================
    $prefix         = '';
    $controllerName = 'notify';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/no-permission',                             [ 'as' => $controllerName . '/noPermission',                  'uses' => $controller . 'noPermission' ]);
    });

    // ====================== LOGIN ========================
    // news69/login
    $prefix         = '';
    $controllerName = 'auth';
    
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/login',        ['as' => $controllerName.'/login',      'uses' => $controller . 'login'])->middleware('check.login');;
        Route::post('/postLogin',   ['as' => $controllerName.'/postLogin',  'uses' => $controller . 'postLogin']);

        // ====================== LOGOUT ========================
        Route::get('/logout',       ['as' => $controllerName.'/logout',     'uses' => $controller . 'logout']);
    });

    // // ============================== CONTACT ============================== //
    // $prefix = 'lien-he.html'; // http://proj_news.xyz/news69/lien-he.html
    $prefix = 'lien-he'; // http://proj_news.xyz/news69/lien-he
    $controllerName = 'contact';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        // Route::get('/', [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);
        Route::get('/', [ 'as' => $controllerName, 'uses' => $controller . 'index' ]);

        Route::post('/post-contact',                 [ 'as' => $controllerName . '/post_contact',                  'uses' => $controller . 'postContact' ]);
        Route::get('/thank-you.html',                 [ 'as' => $controllerName . '/thankyou',                  'uses' => $controller . 'thankyou' ]);
    });

    // ====================== ABOUT US ========================
    // $prefix         = 'about-us';
    $prefix         = '';
    $controllerName = 'about';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';

        // Route::get('/',  
        Route::get('/about-us.html',[ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);
        // http://proj_news.xyz/news69/about-us.html

        // Route::get('/about-us.html',[ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);
    });

    // ============================== COMMENT ==============================
    $prefix         = 'comment';
    $controllerName = 'comment';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::post('addComment/{product_id}',      [ 'as' => $controllerName . '/addComment',  'uses' => $controller . 'addComment'])->where('product_id', '[0-9]+');
    });
    


});

