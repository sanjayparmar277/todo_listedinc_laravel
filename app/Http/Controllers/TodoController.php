<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;

class TodoController extends Controller
{
    public function __construct(){

    }
    /**
     * Display a form, listing, pendif and completed of the todo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingTodos = Todo::where('status', '0')->orderby('id', 'desc')->get();
        $completedTodos = Todo::where('status', '1')->orderby('id', 'desc')->get();
        return view('todo.index', ['pending_todos' => $pendingTodos, 'completed_todos' => $completedTodos]);
    }

    /**
     * Show the form for creating a new todo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created todo in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|max:255'
        ]);

        Todo::create([
            'task' => $request->task,
            //'status' => 0 //default store 0 from database
        ]);

        return redirect('/')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'task' => 'required:max:255',
        ]);

        $getTodo = Todo::find($id);

        $getTodo->task = $request->task;
        $getTodo->status = ($request->status == 'on') ? '1' : '0';
        $getTodo->save();

        return redirect('/')->with('success_update', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentTodo = Todo::findOrFail($id);
        $currentTodo->delete();
        return redirect('/')->with('task_deleted', 'Task deleted successfully');
    }
}
