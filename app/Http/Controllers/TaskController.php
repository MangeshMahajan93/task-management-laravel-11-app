<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Include / Import Model File : 
use App\Models\Task;


class TaskController extends Controller
{

    // Custom
    protected $task;
    public function __construct(){
        $this->task = new Task();        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['tasks'] = $this->task->all();
        $response['taskCount'] = $this->task->count();
        return view('pages.index')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string'
        ]);
        $this->task->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['task'] = $this->task->find($id);
        return view('pages.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $task = $this->task->find($id);
        $task->update(array_merge($task->toArray(), $request->toArray()));
        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = $this->task->find($id);
        $task->delete();
        return redirect('task');
    }

    public function clear()
    {
        $this->task->truncate();
        return redirect('task');
    }

}
