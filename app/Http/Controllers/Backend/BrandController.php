<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function index(){
        $title = "All Brands";
        $brands = Brand::all()->sortBy('brand_name');
        return view('admin.brands.list',compact('brands','title'));
        
    }

    public function create(){
        $title = "Create Brand";
        return view('admin.brands.create',compact('title'));
    }

    public function store(Request $request){
        $rules = [
            'brand_name'=>'required|string|unique:brands'
        ];

        $data = $request->validate($rules);

        if($brand_image = $request->file('brand_image')){
            $filename = $request->brand_name.'.'.$brand_image->getClientOriginalExtension();
            $directory = 'upload/brands/';
            $image_path = $directory.$filename;
            @Image::make($brand_image)->resize(300,300)->save($image_path);
            $data['brand_image'] = $image_path;
        }
        
        $data['brand_slug'] = strtolower(str_replace(" ","-",$request->brand_name));

        if(Brand::insert($data)){
            $message = [
                'message'=>'Brand Saved Successfully',
                'type'=>'success'
            ];
            return redirect(route('admin.brand.all'))->with($message);
        }
        else{
            $message = [
                'message'=>'An error occured, Please try again',
                'type'=>'error'
            ];     
            return back()->with($message);
        }            
    }

    public function edit($id){
        $brand = Brand::findOrFail($id);
        $title = "Editing Brand : ". $brand->brand_name;
        return view('admin.brands.edit',compact('brand','title'));
    }

    public function update(Request $request,$id){
        $brand = Brand::findOrFail($id);

        $rules = [
            'brand_name'=>'required|string'
        ];

        $data = $request->validate($rules);

        if($brand_image = $request->file('brand_image')){
            unlink($brand->brand_image);
            $filename = $request->brand_name.'.'.$brand_image->getClientOriginalExtension();
            $directory = 'upload/brands/';
            $image_path = $directory.$filename;
            @Image::make($brand_image)->resize(300,300)->save($image_path);
            $data['brand_image'] = $image_path;
        }
        

        if($brand->update($data)){
            $message = [
                'message'=>'Brand Updated Successfully',
                'type'=>'success'
            ];
            return redirect(route('admin.brand.all'))->with($message);
        }
        else{
            $message = [
                'message'=>'An error occured, Please try again',
                'type'=>'error'
            ];     
            return back()->with($message);
        }         
    }

    public function delete($id){
        $brand = Brand::findOrFail($id);        
        if($brand->delete()){
            unlink($brand->brand_image);
            $message = [
                'message'=>'Brand Deleted Successfully',
                'type'=>'success'
            ];              
        }
        else{
            $message = [
                'message'=>'An error occured, Please try again',
                'type'=>'error'
            ];  
        }
        return redirect(route('admin.brand.all'));
    }
}
