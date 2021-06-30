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
// use App\Image;

Route::get('/', function () {

    /*    $images = Image::all();
        foreach($images as $image){
            echo $image->image_path."<br/>";
            echo $image->description."<br/>";
            echo $image->user->name."  ".$image->user->surname."<br/>  <h2>Comentarios</h2>";

            foreach($image->comments as $comment){
                echo  $comment->user->name."  ".$comment->user->surname.": ".$comment->content."<br/>";
            }

            echo "LIKES: ".count($image->likes);
            echo "<hr/>";
        }
        die(); 
    */

    return view('welcome');
});

Auth::routes();

Route::get('/config', 'UserController@config')->name('config'); 
Route::post('/update', 'UserController@update')->name('user.update');
Route::get('/create-image', 'ImageController@create')->name('image.create');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/image/post/{filename}', 'ImageController@getImage')->name('image.post');
Route::get('/image/detail/{id}', 'ImageController@detail')->name('image.detail');
Route::post('/save-image', 'ImageController@save')->name('image.save');
Route::post('/comment-upload', 'CommentController@upload')->name('comment.upload');

Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');
Route::get('/like/{image_id}', 'LikeController@like')->name('like.like');
Route::get('/likes', 'LikeController@likes')->name('like.likes');
Route::get('/profile/{id}', 'UserController@profile')->name('user.profile');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.dislike');
