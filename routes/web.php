<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;

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

Route::get('lang/{locale}', function ($locale) {
    if(in_array($locale, config('app.available_locales'))) session()->put('locale', $locale);

    return redirect()->back();
})->name('set-lang');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    Route::resource('posts', PostController::class);
});

Route::get('/users/check-unique-email/{email}', [UserController::class, 'checkUniqueEmail']);

Route::get('/fakegenerator',function(){
    $faker = Faker\Factory::create();
    $limit = 40000;
//    $limit = 5;
    $vueStuff = "";
    $fullJson = "{ \n";
    $salto = ",\n";
    for ($i = 0; $i < $limit; $i++) {
        $clave = substr($faker->unique()->text(16),0,-1);
        $fullJson .= nl2br ( '  "' . $clave . '": "' . $faker->text(16) . '"' . $salto);
        $vueStuff .= "{{__('" . $clave . "') }} \n";
        if ($i== $limit-2) $salto = "\n }";
    }
//    preg_replace(strrev("/,/"),strrev(''),strrev($string),1)
    echo $fullJson;
    echo " \n";
    echo $vueStuff;
});


Route::get('/posts/create/veevalidate', [PostController::class, 'createVeeValidate'])->name('posts.create.veevalidate');
Route::get('/posts/create/vuelidate', [PostController::class, 'createVuelidate'])->name('posts.create.vuelidate');

Route::get('/files', [FileController::class, 'index'])->name('files');
Route::post('/files-s3', [FileController::class, 'storeS3']);
Route::post('/files-dropbox', [FileController::class, 'storeDropbox']);
