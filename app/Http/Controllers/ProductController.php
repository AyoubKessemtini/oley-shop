<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function indexaddproduct(){
        return view('admin.addproduct')->with('categories',Category::all());
    }
    public function addproduct(Request $request){
        $image=$request->image;
        $imagenewname=time().$image->getClientOriginalName();
        $image->move('uploads',$imagenewname);
        $product=new Product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->price=$request->price;
        $product->image='uploads/'. $imagenewname;
        $product->link=$request->link;
        $product->originalPrice=$request->originalprice;
        $product->save();
        return redirect('/admin/allproducts')->with('categories',Category::all());
    }
    public function indexallproductsforadmin(){
        return view('admin.allproducts')->with('products',Product::with('category')->get())->with('categories',Category::all());
    }
    public function deleteproduct($id){
        Product::find($id)->delete();
        return back()->with('msg','product deleted')->with('categories',Category::all());
    }
    public function indexupdateproduct($id){
        return view('admin.updateproduct')->with('product',Product::find($id))->with('categories',Category::all());
    }
    public function updateproduct($id,Request $request){
        $product=Product::find($id);
        $image=$request->image;
        $imagenewname=time().$image->getClientOriginalName();
        $image->move('uploads',$imagenewname);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->price=$request->price;
        $product->image='uploads/'. $imagenewname;
        $product->link=$request->link;
        $product->originalPrice=$request->originalprice;
        $product->save();
        return redirect('/admin/allproducts')->with('categories',Category::all());

    }
    public function allproductspercategory($category_id){
        
        $products= Product::where('category_id',$category_id)->get();
        if($products!=[ ]){
            return view('admin.allproductspercategory')->with('products',$products)->with('categories',Category::all());
        }
        
        else{
            return view('admin.allproducts')->with('products',$products)->with('categories',Category::all());
        }
        
    }

    public function updatestatusproduct(Request $request){
        $product=Product::find($request->product_id);
        if($product->status == true){
            $product->status=false;
            $product->save();
        }else{
            $product->status=true;
            $product->save();
        }
        return redirect()->back();

    }
}
