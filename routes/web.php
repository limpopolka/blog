<?php
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('tasks', function(){
	$tasks = DB::table('tasks')->get();
	dd($tasks);
});

Route::get('tasks/{task}', function($id){
	$task = DB::table('tasks')->find($id);
	dd($task);
});



Route::get('complete', function(){
	$task = DB::table('tasks')->where('status', '=', 100)->get();
	dd($task);
});

Route::post('taskss', function(Request $request){
	$newTask = DB::table('tasks')->insert(
		[
			'name' => $request['name'],
			'description' => $request['description'],
			'category'    => $request['category'],
			'deadline'    => $request['deadline'],
			'status'      => $request['status']
 		]
	);
	dd($request['name']);
});

