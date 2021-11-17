<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect; 

class BrandController extends Controller
{
    public function AllBrand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index' , compact('brands'));
    }
    public function StoreBrand(Request $request){
    
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',

        ],
        [
            'brand_name.required' => 'Please Input brand Name',
            'brand_image.min' => 'Brand Longer  then 4 Characters',
        ]);
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
        $last_img = 'image/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request-> brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'Brand Inserted Successfully');
        
    }
    public function Edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }
    public function Update(Request $request, $id){
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer  then 4 Characters',
        ]);

        $old_image = $request->old_image;

        $brand_image = $request->brand_image;

        $name_gen = hexdec(uniqid());
        

        unlink($old_image);
        Brand::find($id)->Update([
            'brand_name' => $request-> brand_name,
            'brand_image' => $old_image,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('all.Brand')->with('success', 'Brand Updated Successfully');

        Brand::find($id)->delete();
        
        return Redirect()->back()->with('success', 'Brand Delete Successfully');
    }
    
    
}
