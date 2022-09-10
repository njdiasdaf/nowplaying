<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NowpController;
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

//Route::get('/', function () {
    //return view('user.welcome');
//});


//Route::get('/dashboard', function () {
    //return view('user.dashboard');
//middlewareでログインしたユーザーのみ使用できるようにしている。
//})->middleware(['auth:users'])->name('dashboard');

//require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/index', [NowpController::class, 'index'])
    ->middleware('auth')
    ->name('index');

Route::get('/indexadmin', [NowpController::class, 'indexadmin'])
    ->middleware('auth')
    ->name('indexadmin');

Route::get('/indexadm', [NowpController::class, 'indexadm'])
    ->middleware('auth')
    ->name('indexadm');

Route::get('/indexpost', [NowpController::class, 'indexpost'])
    ->middleware('auth')
    ->name('indexpost');

Route::post('/indexpost', [NowpController::class, 'indexpost'])
    ->middleware('auth')
    ->name('indexpost');

Route::get('/mypage', [NowpController::class, 'mypage'])
    ->middleware('auth')
    ->name('mypage');

Route::post('/mypage', [NowpController::class, 'mypage'])
    ->middleware('auth')
    ->name('mypage');

Route::get('/acedit', [NowpController::class, 'acedit'])
    ->middleware('auth')
    ->name('acedit');

Route::post('/acedit', [NowpController::class, 'acedit'])
    ->middleware('auth')
    ->name('acedit');

Route::get('/aceditcomp', [NowpController::class, 'aceditcomp'])
    ->middleware('auth')
    ->name('aceditcomp');

Route::post('/aceditcomp', [NowpController::class, 'aceditcomp'])
    ->middleware('auth')
    ->name('aceditcomp');
    
Route::get('/acedel', [NowpController::class, 'acedel'])
    ->middleware('auth')
    ->name('acedel');

Route::post('/acedel', [NowpController::class, 'acedel'])
    ->middleware('auth')
    ->name('acedel');

Route::get('/acedelcomp', [NowpController::class, 'acedelcomp'])
    ->middleware('auth')
    ->name('acedelcomp');

Route::post('/acedelcomp', [NowpController::class, 'acedelcomp'])
    ->middleware('auth')
    ->name('acedelcomp');

Route::get('/postedit', [NowpController::class, 'postedit'])
    ->middleware('auth')
    ->name('postedit');

Route::post('/postedit', [NowpController::class, 'postedit'])
    ->middleware('auth')
    ->name('postedit');

Route::get('/posteditcomp', [NowpController::class, 'posteditcomp'])
    ->middleware('auth')
    ->name('posteditcomp');

Route::post('/posteditcomp', [NowpController::class, 'posteditcomp'])
    ->middleware('auth')
    ->name('posteditcomp');

Route::get('/posteditadm', [NowpController::class, 'posteditadm'])
    ->middleware('auth')
    ->name('posteditadm');

Route::post('/posteditadm', [NowpController::class, 'posteditadm'])
    ->middleware('auth')
    ->name('posteditadm');

Route::get('/posteditcompadm', [NowpController::class, 'posteditcompadm'])
    ->middleware('auth')
    ->name('posteditcompadm');

Route::post('/posteditcompadm', [NowpController::class, 'posteditcompadm'])
    ->middleware('auth')
    ->name('posteditcompadm');

Route::get('/postdel', [NowpController::class, 'postdel'])
    ->middleware('auth')
    ->name('postdel');

Route::post('/postdel', [NowpController::class, 'postdel'])
    ->middleware('auth')
    ->name('postdel');


Route::post('/postdeladm', [NowpController::class, 'postdeladm'])
    ->middleware('auth')
    ->name('postdeladm');


Route::get('/likelist', [NowpController::class, 'likelist'])
    ->middleware('auth')
    ->name('likelist');

Route::post('/likelist', [NowpController::class, 'likelist'])
    ->middleware('auth')
    ->name('likelist');


Route::get('/search', [NowpController::class, 'search'])
    ->middleware('auth')
    ->name('search');

Route::post('/search', [NowpController::class, 'search'])
    ->middleware('auth')
    ->name('search');


require __DIR__.'/auth.php';


//Route::get('/index','App\Http\Controllers\NowpController@index');
//Route::get('/index', [NowpController::class, 'index'])->name('index');


//Route::get('/indexpost','App\Http\Controllers\NowpController@indexpost');
//Route::post('/indexpost','App\Http\Controllers\NowpController@indexpost');


Route::post('/like/{postId}',[LikeController::class,'store']);
Route::post('/unlike/{postId}',[LikeController::class,'destroy']);


//Auth::routes();

Route::resource('post', 'App\Http\Controllers\NowpController');
Route::post('/like_post', 'App\Http\Controllers\NowpController@like_post');




// admin以下は管理者のみアクセス可
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {
    Route::get('/', function () {
        return 'admin only';
    });
});  