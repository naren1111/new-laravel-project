<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productinser;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class listController extends Controller
{
   public function listing()
   {
     $tables = DB::select("select * from productlist");
     return view('user.listing')->with('tables',$tables);
   }
   
    public function addproduct()
   {
     return view('user.addproduct');
   }
   
   public function create(Request $request)
   {
    $this->validate($request, [
        'name' => 'required',
        'qty' => 'required',
        'rate' => 'required',
    ]);
    $product = new productinser;
    $product->name = $request['name'];
    $product->qty = $request['qty'];
    $product->rate = $request['rate'];
    $product->save();
    
    $request->session()->flash('success','Your details have now been insert!');
    return redirect()->action('listController@listing');
   }
   
   public function destroy($id)
   {
        DB::delete('delete from productlist where id = ?',[$id]);
        session()->flash('success','Record deleted successfully.');
        return redirect()->action('listController@listing');
   }
   
   public function edit(Request $request,$productid)
   {
     $productrecord = DB::select("select * from productlist where id = ?",[$productid]);
     return view('user.editproduct')->with('productrecord',$productrecord);
   }
      
   public function update(Request $request,$updateid)
   {
    $this->validate($request,[
         'name' => 'required',
         'qty' => 'required',
         'rate' => 'required',
    ]);
        $name = $request->input('name');
        $qty = $request->input('qty');
        $rate = $request->input('rate');    
        //DB::table('productlist')->whereIn('id', $updateid)->update($request->all());    
        DB::update('update productlist set name=?,qty=?,rate=? where id = ?',[$name,$qty,$rate,$updateid]);
        session()->flash('success','Record updated successfully.');
        return redirect()->action('listController@listing');
   }
}
