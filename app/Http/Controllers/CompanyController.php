<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use Image;
use Auth;
use Illuminate\Support\Carbon;

class CompanyController extends Controller
{
    public function AllCompany(){
        $Companies = Company::latest()->get();
        return view('admin.company.index', compact('Companies'));
    }
    
    public function AddCompany(){
        return view('admin.company.create');
        
}


public function StoreCompany( request $request){
    $company_image = $request->file('image');
    
    $name_gen = hexdec(uniqid()).'.'.$company_image->getClientOriginalExtension();
    Image::make($company_image)->resize(500,300)->save('image/company/'.$name_gen);
    $last_img = 'image/company/'.$name_gen;


    
    company::insert([
        'company_name' => $request-> company_name,
        'company_about' => $request-> company_about,
        'company_image' => $last_img,
        'company_region' => $request-> company_region,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('all.company')->with('success', 'company Inserted Successfully');
}
public function Delete($id){
    $image = company::find($id);
    $old_image=$image->company_image;
    
    


    company::find($id)->delete();
    return Redirect()->back()->with('success', 'company Delete Successfully');
}


public function Edit($id){
    $brands = company::find($id);
    return view('admin.company.edit',compact('Companies'));
}




public function Logout(){
    Auth::logout();
    return Redirect()->route('login')->with('success', 'User logout');
}

}


