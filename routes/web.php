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
//phpinfo();

Route::get('/books','BooksController@index');
Route::get('/books/{bno}','BooksController@show');

// Route::get('/books', function () {

// 	$books=App\Book::all();
// 	return view('books.index', compact('books'));

// 	// $tasks = [
// 	// 	'你好',
// 	// 	'no.2',
// 	// 	'no.3'
// 	// ];
// 	// return view('welcome',compact('tasks'));

// 	// $name = 'Biubi';
// 	// return view('welcome',['name' => $name]);

// 	// return view('welcome')->with('name','world');

//     // return view('welcome',[
//     // 	'name' => 'World'
//     // ]);

// });


// Route::get('/books/{bno}', function ($bno) {

// 	$book = DB::table('books')->where('bno',$bno)->first();
// 	//dd($book);

// 	return view('books.show', compact('book'));
// });


Route::get('/layout', function(){
	return view('layout');
});

Route::get('/bookstorage', function(){
	return view('bookstorage');
});

Route::post('/booksearch', function(){
	return view('booksearch');
});

Route::get('/recordborrow', function(){
	return view('recordborrow');
});

Route::get('/recordreturn', function(){
	return view('recordreturn');
});

Route::get('/recordsearch', function(){
	return view('recordsearch');
});

Route::get('/cardinsert', function(){
	return view('cardinsert');
});
Route::get('/carddelete', function(){
	return view('carddelete');
});
Route::get('/login', function(){
	return view('login');
});
Route::get('/bookupload', function(){
	return view('bookupload');
});

Route::post('/books','BooksController@store');
Route::get('/bookstorage','BooksController@index');
Route::get('/cardinsert','CardsController@index');
Route::get('/carddelete','CardsController@delete');
Route::post('/cards','CardsController@store');
Route::get('/booksearch','BooksController@show');
Route::get('/recordsearch','RecordsController@show');
Route::get('/recordborrow','RecordsController@store');
Route::get('/recordreturn','RecordsController@index');
Route::post('/fromtosearch','BooksController@show');
Route::get('/login','ManagersController@index');
Route::post('/bookupload','BooksController@upload');

