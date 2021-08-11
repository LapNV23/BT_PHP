<?php

use Illuminate\Support\Facades\Route;

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
use App\Task;
use Illuminate\Http\Request;
//Route::get('/', function (){
//    return view('welcome');
//});
Route::get('/', function (){
    $tasks = Task::orderBy('creates_at', 'desc')->get();
    return view('tasks',[
        'task' => $tasks
    ]);
});
//Add New Task
Route::get('/task', function (Request $request){
//validate information
    $validator = \Dotenv\Validator::make($request->all(),[
        'name' => 'required|max:255',
    ]);

    if($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $task = new Task;
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});
//Delete task
Route::get('/task/{task}',function (Task $task){

});
