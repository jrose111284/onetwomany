<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
   
   $user = User::findOrFail(1);

//    $post = new  Post(['title'=>'welcome', 'content'=> "glad you read this"]);

    $user->posts()->save(new Post(['title'=>'welcome', 'body'=> "glad you read this"]));
});


Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->posts as $item ) {
        echo $item->title . "<br>";
    }

});


Route::get('/update', function () {
    $user = User::findOrFail(1);
git 
//    $user->posts()->update(['title'=>'not welcome']);
    $user->posts()->whereId(2)->update(['title'=>'hello welcome']);


});

Route::get('/delete', function () {
    $user = User::findOrFail(1);

    $user->posts()->whereId(2)->delete();
});
