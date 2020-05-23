<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Categotie;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;  
use Session;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $tasks = DB::table('tasks')
                        ->join('categories','categories.id','=','tasks.categori_id')
                        ->select('tasks.*','categories.name');
            
            if($request->has('search')) {
                    $request->flash();
                   $tasks->Where('tasks.title', 'LIKE', '%' . $request->search . '%');
                } 
            
           $tasks = $tasks->paginate(2); 
                        
           return view('tasks.tasks',['tasks'=>$tasks]);
          /* if($request->get('search')!='')
         {
         }
         else
         {
            
         }  */
        
    }
    
    public function create()
    {
        $categories = Categotie::All();
        return view('tasks.taskscreate',compact('categories',$categories));
        
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required',
            'categori_id' => 'required',
            'image' => 'required',
            //'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $task = Task::create();
            
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->categori_id = $request->input('categori_id');
        
        if($request->hasfile('image'))
        {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('image',$filename);
            $task->image_url = $filename;
        }
        else
        {
            return $request;
            $task->image_url = '';
        }
        $task->save();
        $request->session()->flash('success','Your details have now been insert!');
        return redirect()->action('TaskController@index');
    }
      
    public function edit($taskid)
    {
        $task = Task::find($taskid);
        $categories = Categotie::All();
        return view('tasks.tasksedit',['tasks'=>$task, 'categories'=>$categories,]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required',
            'categori_id' => 'required',
            'image' => 'required',
        ]);
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->categori_id = $request->categori_id;
        if($request->hasfile('image'))
        {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('image',$filename);
            $task->image_url = $filename;
        }
        else
        {
            return $request;
            $task->image_url = '';
        }
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
    
    public function search(Request $request)
    {
        $search = $request->get('search');
        $tasks = DB::table('tasks')->where('title', 'like', '%' . $search . '%')->paginate(2);
        return view('tasks.tasks',['tasks'=>$tasks]);
    }
}
