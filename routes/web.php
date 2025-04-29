<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MapController;
use App\Http\Controllers\InterventionController;

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

// Route::get('/adminposts', function () {
//     return view('welcome');

// });

// Route::get('/about', function () {
// //    return view('welcome');
//     return "Hi about";

// });

// Route::get('/contact', function () {
//     //    return view('welcome');
//         return "I am contact";
    
// });

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return "This is post number " . $id . " " . $name;
// });

// Route::get('admin/posts/example', array('as'=>'admin.home', function(){
//     $url = route('admin.home'); 
//     return "this url is". $url;
// }));

//Route::get('/post/{id}', 'App\Http\Controllers\PostsController@index');

//Route::resource('posts', 'App\Http\Controllers\PostsController'); 

Route::get('/contact', 'App\Http\Controllers\PostsController@contact');

Route::get('post/{id}/{name}/{password}', 'App\Http\Controllers\PostsController@show_post');

Route::get('home', 'App\Http\Controllers\PostsController@home');

Route::get('/map', function () {
    return view('map');
});


Route::get('/interventions', function () {
    return redirect()->route('interventions.show', ['region' => 'Region 1']);
});



Route::get('interventions/{region}', [InterventionController::class, 'show'])->name('interventions.show');
Route::get('interventions/submissions/{region}', [InterventionController::class, 'submissions'])->name('interventions.submissions');
Route::get('interventions/summary/{region}', [InterventionController::class, 'summary'])->name('interventions.summary');





Route::get('/insert', function(){

    DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel yarn', 'Laravel is the best']);
});  

