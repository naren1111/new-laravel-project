<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::All();
        return view('tasks.tasks',compact('tasks',$tasks));
    }
    
    public function create()
    {
        return view('tasks.taskscreate');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required',
        ]);
        $task = Task::create([
            'title' => $request->title, 
            'description' => $request->description
        ]);
        $request->session()->flash('success','Your details have now been insert!');
        return redirect()->action('TaskController@index');
    }
      
    public function edit($taskid)
    {
        $task = Task::find($taskid);
        
        return view('tasks.tasksedit',['tasks'=>$task]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required',
        ]);
        $task = Task::find($id);
        //$task->user_id = auth()->id();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        
        $request->session()->flash('success','Successfully update the task!');
        return redirect()->action('TaskController@index');
    }
        
    public function destroy(Request $request, $taskid)
    {
        $task = Task::find($taskid);
        $task->delete();
                
        $request->session()->flash('success','Your details have now been insert!');
        return redirect()->action('TaskController@index');
    }
}
