<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageCrud;
use Session;
use File;

class ImageCrudController extends Controller
{
    public function all_products () 
    {
        $products = ImageCrud::all();
        return view('products',compact('products'));
    }

    public function add_new_product () {
        return view('add_new_product');
    }

    public function update_product (Request $request, $id) 
    {
        $product = ImageCrud::findOrfail($id);
        $request->validate([
            'name'=>'required',
        ]);

        $imageName = '';
        $deleteOldImage= 'images/products/'.$product->image;

        if($image = $request->file('image')) {
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products',$imageName);
        }else{
            $imageName = $product->image;
        }

        ImageCrud::where('id',$id)->update ([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);

        Session::flash('msg','নতুন প্রডাক্ট আপডেট হয়েছে');
        return redirect()->back();
    }

    public function edit_product ($id)
    {
        $product =ImageCrud::findOrFail($id);
        
        return view('edit_product',compact('product'));
    }

    public function store_product (Request $request) 
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
        ]);

        $imageName = '';
        
        if($image = $request->file('image')) {
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products',$imageName);
        }else{
            $imageName = $product->image;
        }

        ImageCrud::Create([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);

        Session::flash('msg','নতুন প্রডাক্ট আপডেট হয়েছে');
        return redirect()->back();
    }

    public function delete_product($id)
    {
        $product =ImageCrud::findOrFail($id);
        $deleteOldImage= 'images/products/'.$product->image;
        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        $product->delete();
        Session::flash('msg','প্রডাক্ট মুছে ফেলা হয়েছে');
        return redirect()->back();

    }

}
   

