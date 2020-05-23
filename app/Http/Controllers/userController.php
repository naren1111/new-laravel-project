<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;


use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit()
    {
        if(Auth::user())
        {
           $user = User::find(Auth::user()->id);
           
           if($user)
           {
             return view('user.edit')->withUser($user);
           }
           else
           {
            return redirect()->back();
           }
        }
        else
        {
            return redirect()->back();
        }
    }
    
    public function update(Request $request)
    {
        $user  = User::find(Auth::user()->id);
        
        if($user)
        {
            /*$validate = $request->validate([
                'name' => 'required',
                'address' => 'required',
                'mobile' => 'required|max:10|min:10',
            ]);*/
            $this->validate($request, [
                'name' => 'required',
                'address' => 'required',
                'mobile' => 'required|max:10|min:10',
            ]);
            $user->name = $request['name'];
            $user->address = $request['address'];
            $user->mobile = $request['mobile'];
            $user->save();
            
            $request->session()->flash('success','Your details have now been update!');
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }
}
