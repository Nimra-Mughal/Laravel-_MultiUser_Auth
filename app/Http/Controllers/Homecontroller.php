<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\brand;
use App\Models\product;

class Homecontroller extends Controller
{
    function index(){
       if(Auth::id()){
        $usertype=Auth()->user()->usertype;
        if($usertype=='user'){
            return view('user.dashboard');
        }
        else if($usertype=='admin'){
            return view('admin.dashboard');
        }
       }
    }
    function dbaddproduct(){
        $brand=brand::all();
        return view('admin.dbaddproduct',compact('brand'));
    }
    function dbviewproduct(){
        return view('admin.dbviewproduct');
    }
    function dbaddbrand(){
        return view('admin.dbaddbrand');
    }
    function addbranddata(Request $request){
        $data= new brand();
        $data->name=$request->input('name');
        $data->description=$request->input('desc');

        if($request->hasFile('image')){
            $image=$request->file('image');
            $ext=$image->getClientOriginalExtension();
            $image_name=time().".".$ext;
            $image->move('images',$image_name);
            $data->image="images/".$image_name;
        }
        $data->save();
        return back();

    }
    function addproductdata(Request $request){
        $product = new product();
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->brand=$request->input('brand');
        $product->description=$request->input('desc');
        if($request->hasFile('image')){
            $image=$request->file('image');
            $ext=$image->getClientOriginalExtension();
            $image_name=time().".".$ext;
            $image->move('images',$image_name);
            $product->image="images/".$image_name;
        }
        $product->save();
        return back();


    }
}
