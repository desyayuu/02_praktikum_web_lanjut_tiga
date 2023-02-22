<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AboutController;
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

//-----------------NO.1-------------------------
//1. Halaman home
Route::get('/', function(){
    echo "Welcome to Website Educastudio";
});

//1. Halaman home menggunakan controller 
Route::get('/', [HomeController::class, 'index']);


//-----------------NO.2-------------------------
//2. Route prefix tanpa controller
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


//2. Route prefix menggunakan controller 
Route::prefix('category')->group(function(){
    Route::get('/marbel-edu-games', [ProductController::class, 'edugames']);
    Route::get('/marbel-and-friends-kids-games', [ProductController::class, 'kidsgames']);
    Route::get('/riri-story-books', [ProductController::class, 'riristory']);
    Route::get('/kolak-kids-songs', [ProductController::class, 'kolakkids']);
});

//-----------------NO.3-------------------------
//3. Route parameters
Route::get('/news/{namaberita?}', function ($nama=null){
    echo "Selamat datang di page news $nama";
});

//-----------------NO.4-------------------------
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

//4. Route prefix daftar program menggunakan controller
Route::prefix('program')->group(function(){
    Route::get('/karir', [ProgramController::class, 'karir']);
    Route::get('/magang', [ProgramController::class, 'magang']);
    Route::get('/kunjungan-industri', [ProgramController::class, 'industri']);
});

//-----------------NO.5-------------------------
//5. Route biasa (tanpa controller)
Route::get('home/about-us', function(){
    echo "About-us";
})->name('about-us');

//5. Route biasa dengan controller 
Route::get('home/about-us', [AboutController::class, 'about']);


//-----------------NO.6-------------------------
//6. Route resource only
Route::resource('contact-us', ContactController::class);
Route::resource('contact-us',  ContactController::class)->only([
    'index', 'store'
]);