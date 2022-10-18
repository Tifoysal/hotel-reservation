<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Thana;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function thanaList()
    {
        $thanas=Thana::all();
        return view('backend.layouts.thana.list',compact('thanas'));
    }

    public function thanaCreate()
    {
        $districts=District::all();
        return view('backend.layouts.thana.create',compact('districts'));
    }

    public function thanaCreatePost(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'bn_name'=>'required',
           'district_id'=>'required'
        ]);

        Thana::create([
            'name'=>$request->name,
            'bn_name'=>$request->bn_name,
            'district_id'=>$request->district_id,
        ]);

        return redirect()->back()->with('message','Thana Created Successfully.');
    }
}
