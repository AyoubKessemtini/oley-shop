<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function indexaddcategory(){
       
        return view('admin.addcategory')->with('categories',Category::all());
    }
    public function addcategory(Request $request){
        $image=$request->image;
        $imagenewname=time().$image->getClientOriginalName();
        $image->move('uploads/category',$imagenewname);
        $category=new Category;
        $category->name=$request->name;
        $category->image='uploads/category/' . $imagenewname;
        $category->save(); 
        return redirect()->route('indexaddproduct')->with('categories',Category::all());
    }
    public function indexallcategoriesforadmin(){
        return view('admin.allcategories')->with('categories',Category::all());
    }
    public function deletecategory($id){
        Category::find($id)->delete();
        return redirect()->back()->with('categories',Category::all());
    }
}
