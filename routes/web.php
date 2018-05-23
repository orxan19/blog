<?php


// Home routes
Route::paginate('/', 'HomeController@index');

Route::paginate('/post/{slug}', 'HomeController@show')->name('post.show');
Route::paginate('/tag/{slug}', 'HomeController@tag')->name('tag.show');
Route::paginate('/category/{slug}', 'HomeController@category')->name('category.show');

Route::post('/subscribe', 'SubsController@subscribe');
Route::get('/verify/{token}', 'SubsController@verify');
// END: Home routes



Route::group(['middleware'=> 'auth'], function(){
   Route::get('/logout', 'AuthController@logout'); 
   Route::get('/profile', 'ProfileController@index');
   Route::post('/profile', 'ProfileController@store');
   Route::post('/comment', 'CommentsController@store');

});

Route::group(['middleware'=> 'guest'], function(){
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');

 });



Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'PostsController');
    Route::get('/comments', 'CommentsController@index');
    Route::get('/comments', 'CommentsController@index');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
    Route::resource('/subscribers', 'SubscribersController');
});



