<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Resort;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ResortController extends Controller
{
    public function list()
    {
        $resorts=Resort::all();
        return view('backend.layouts.resort.list',compact('resorts'));
    }

    public function edit($id)
    {
        $resort=Resort::find($id);
        return view('backend.layouts.resort.edit',compact('resort'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'mobile'=>'required',
        ]);

        $resort=Resort::find($id);

        $resort->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'mobile'=>$request->mobile,
            'status'=>$request->status,
        ]);
        Toastr::success('success','Resort Updated Successfully.');
        return redirect()->back();
    }

    public function create()
    {
        return view('backend.layouts.resort.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required|unique:resorts'
        ]);

        Resort::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'mobile'=>$request->mobile,
        ]);

        Toastr::success('success','Resort Created Successfully.');
        return redirect()->back();
    }

    public function delete($id)
    {
        $checkUser=User::where('resort_id',$id)->get();
        if(count($checkUser)===0)
        {
            try {
                $resort=Resort::findOrFail($id);
                $resort->delete($id);
                Toastr::success('success','Resort Deleted Successfully.');
                return redirect()->back();
            }catch (QueryException $e)
            {
                Toastr::error('error','Sorry!! You can not delete the record.');
                return redirect()->back();
            }
        }else
        {
            Toastr::error('error','Sorry!! You can not delete the record (User Exist).');
        return redirect()->back();
        }


    }
}
