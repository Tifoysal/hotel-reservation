<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Resort;
use App\Models\Room;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function list()
    {

        if(auth()->user()->user_type==='admin')
        {
            $rooms=Room::with('resort')->get();
        }else
        {
            $rooms=Room::where('resort_id',auth()->user()->resort_id)->with('resort')->get();
        }
        return view('backend.layouts.room.list',compact('rooms'));
    }

    public function create()
    {
        $resorts=Resort::all();
        return view('backend.layouts.room.create',compact('resorts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number'=>'required|unique:rooms',
            'type'=>'required',
            'resort_id'=>'required',
            'rent'=>'required',
            'bed_capacity'=>'required',
            'details'=>'required',
        ]);

        Room::create([
            "number" => $request->number,
            "resort_id" => $request->resort_id,
            "type" => $request->type,
            "is_ac" => $request->is_ac,
            "meal" => $request->meal,
            "cancellation_rate" => $request->cancellation_rate,
            "bed_capacity" => $request->bed_capacity,
            "telephone" => $request->telephone,
            "rent" => $request->rent,
            "details" => $request->details
        ]);

        Toastr::success('success','Room Created Successfully.');
        return redirect()->back();
    }

    public function edit($id)
    {
        $room=Room::find($id);
        $resorts=Resort::all();
        return view('backend.layouts.room.edit',compact('room','resorts'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
//            'number'=>'required|unique:rooms',
            'type'=>'required',
            'resort_id'=>'required',
            'rent'=>'required',
            'bed_capacity'=>'required',
            'details'=>'required',
        ]);

        Room::where('id',$id)->update([
//            "number" => $request->number,
            "resort_id" => $request->resort_id,
            "type" => $request->type,
            "is_ac" => $request->is_ac,
            "meal" => $request->meal,
            "cancellation_rate" => $request->cancellation_rate,
            "bed_capacity" => $request->bed_capacity,
            "telephone" => $request->telephone,
            "rent" => $request->rent,
            "details" => $request->details
        ]);

        Toastr::success('success','Room Updated Successfully.');
        return redirect()->back();
    }

    public function delete($id)
    {

        try {
            $room=Room::find($id);
            $room->delete($id);
            Toastr::success('success','Room Deleted Successfully.');
            return redirect()->back();

        }catch (QueryException $e)
        {
            Toastr::error('error','Sorry!! You can not delete the record.');
            return redirect()->back();
        }
    }
}
