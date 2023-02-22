<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });

//1. Halam home
Route::get('/', function(){
    echo "Welcome to Website Educastudio";
});

//2. Route prefix
Route::prefix('category')->group(function () {
    Route::get('/marbel-edu-games', function(){
        echo "Halaman edu games";
    });
    Route::get('/marbel-and-friends-kids-games', function(){
        echo "Halaman kids games";
    });
    Route::get('/riri-story-books', function(){
        echo "Halaman riri story books";
    });
    Route::get('/kolak-kids-songs', function(){
        echo "Halaman kolak kids song";
    });
});

//3. Route parameters
Route::get('/news/{name?}', function ($name=null){
    echo "Selamat datang di page news $name";
});

//4. Route prefix daftar program
Route::prefix('program')->group(function (){
    Route::get('/karir', function (){
        echo "Halaman program karir";
    });
    Route::get('/magang', function (){
        echo "Halaman magang";
    });
    Route::get('/kunjungan-industri', function (){
        echo "Halaman kunjungan industri";
    });
});

//5. Route biasa 
Route::get('home/about-us', function(){
    echo "About-us";
})->name('about-us');

//6. Route resource only
Route::resource('contact-us',  ContactController::class)->only([
    'show'
]);

