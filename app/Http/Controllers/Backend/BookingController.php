<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Resort;
use App\Models\Room;
use App\Models\Thana;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Http\Request;
use Shipu\MuthoFun\Facades\MuthoFun;

class BookingController extends Controller
{
    public function create()
    {
        $rooms = Room::where('resort_id', auth()->user()->resort_id)->get();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Thana::all();
        return view('backend.layouts.booking.create', compact('rooms', 'divisions', 'districts', 'upazilas'));
    }

    public function list()
    {
        $date['from'] = '';
        $date['to'] = '';
        $resort_id = null;
        $is_search = false;

        $resorts = Resort::all();
        if (!empty($_GET)) {
            $is_search = true;
            $date['from'] = $_GET['from'];
            $date['to'] = $_GET['to'];


            if (auth()->user()->user_type === 'admin') {
                $resort_id = $_GET['resort_id'];
                if ($resort_id) {
                    $bookings = Booking::with('room')
                        ->where('resort_id', $resort_id)
                        ->whereBetween('arrive', [$_GET['from'], $_GET['to']])
                        ->orderBy('id', 'desc')->get();
                } else {
                    $bookings = Booking::with('room')
                        ->whereBetween('arrive', [$_GET['from'], $_GET['to']])
                        ->orderBy('id', 'desc')->get();
                }


            } else {
                $bookings = Booking::with('room')
                    ->where('resort_id', auth()->user()->resort_id)
                    ->whereBetween('arrive', [$_GET['from'], $_GET['to']])
                    ->orderBy('id', 'desc')->get();
            }
        } else {
            $date['from'] = Carbon::today()->toDateString();
            $date['to'] = Carbon::today()->toDateString();
            if (auth()->user()->user_type === 'admin') {
                $bookings = Booking::with('room')->orderBy('id', 'desc')->get();
            } else {
                $bookings = Booking::with('room')
                    ->where('resort_id', auth()->user()->resort_id)
                    ->orderBy('id', 'desc')->get();

            }

        }

        return view('backend.layouts.booking.list', compact('bookings', 'resort_id', 'resorts', 'date', 'is_search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'mobile'     => 'required',
            'room_id'    => 'required',
        ]);

        $room = Room::find($request->room_id);
        $photo = $request->file('image');
        $file_name = '';
        if ($photo) {
            $file_name = uniqid('image', true) . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/customer'), $file_name);
        }

        Booking::create([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'father_name'     => $request->father_name,
            'mother_name'     => $request->mother_name,
            'mobile'          => $request->mobile,
            'relative_mobile' => $request->relative_mobile,
            'email'           => $request->email,
            'arrive'          => $request->arrive,
            'depart'          => $request->depart,
            'check_in'        => $request->check_in,
            'check_out'       => $request->check_out,
            'gender'          => $request->gender,
            'nid_passport'    => $request->nid_passport,
            'division'        => $request->division,
            'district'        => $request->district,
            'upazila'         => $request->upazila,
            'union'           => $request->union,
            'address'         => $request->address,
            'room_id'         => $request->room_id,
            'profession'      => $request->profession,
            'created_by'      => auth()->user()->id,
            'resort_id'       => auth()->user()->resort_id,
            'image'           => $file_name,
            'age'           => $request->age
        ]);
        $message = 'Booking Created Successfully.';

        try {
            if ($request->type === 'present') {
                $sms = 'Dear ' . $request->first_name . ' ' . $request->last_name . ' , Your Booking is successful. Thank you for choosing our Hotel. If you have any query let us know: 01991-058500.';
            } else {
                $sms = 'Dear ' . $request->first_name . ' ' . $request->last_name . ' , Thank you for choosing to stay at BM Resort. We hope you are enjoying your stay. If you have any query let us know: 01991-058500.';
            }
            $sms = MUTHOFUN::send(
                [
                    'message' => $sms,
                    'to'      => $request->mobile
                ]
            );

        } catch (\Throwable $e) {
            $message = $message . 'Failed to send sms.' . $e->getMessage();
        }

        Toastr::success('success', $message);
        return redirect()->back();

    }

    public function edit($id)
    {
        $rooms = Room::all();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Thana::all();
        $booking = Booking::with('divi')->find($id);
        return view('backend.layouts.booking.edit', compact('rooms', 'divisions', 'districts', 'upazilas', 'booking'));

    }

    public function show($id)
    {
        $rooms = Room::all();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Thana::all();
        $booking = Booking::with(['room', 'resort', 'divi', 'dis', 'thana', 'user'])->find($id);
//        dd($booking);
        return view('backend.layouts.booking.show', compact('rooms', 'divisions', 'districts', 'upazilas', 'booking'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'mobile'     => 'required',
            'room_id'    => 'required',

        ]);
        $booking = Booking::find($id);
        $room = Room::find($request->room_id);
        $photo = $request->file('image');
        $file_name = $booking->image;
        if ($photo) {
            $file_name = uniqid('image', true) . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/customer'), $file_name);
        }
        if (empty($request->input('division'))) {
            $data['division'] = $booking->division;
            $data['district'] = $booking->district;
            $data['upazila'] = $booking->upazila;
        } else {
            $data['division'] = $request->division;
            $data['district'] = $request->district;
            $data['upazila'] = $request->upazila;
        }
//dd($data);
        $booking->update([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'father_name'     => $request->father_name,
            'mother_name'     => $request->mother_name,
            'mobile'          => $request->mobile,
            'relative_mobile' => $request->relative_mobile,
            'email'           => $request->email,
            'arrive'          => $request->arrive,
            'depart'          => $request->depart,
            'check_in'        => $request->check_in,
            'check_out'       => $request->check_out,
            'gender'          => $request->gender,
            'nid_passport'    => $request->nid_passport,
            'division'        => $data['division'],
            'district'        => $data['district'],
            'upazila'         => $data['upazila'],
            'union'           => $request->union,
            'address'         => $request->address,
            'room_id'         => $request->room_id,
            'profession'      => $request->profession,
            'created_by'      => auth()->user()->id,
            'resort_id'       => auth()->user()->resort_id,
            'image'           => $file_name
        ]);

        Toastr::success('success', 'Booking Updated Successfully.');
        return redirect()->back();
    }

    public function delete($id)
    {
        $room = Booking::find($id);
        $room->delete($id);
        Toastr::success('success', 'Booking Deleted Successfully.');
        return redirect()->back();
    }

    public function print($fromDate, $toDate, $resort_id=null)
    {

        $date['from'] = $fromDate;
        $date['to'] = $toDate;
        if($resort_id==='0' ||$resort_id==null)
        {
            $resort_id=null;
            $resort='All';
        }else
        {
            $resort=Resort::find($resort_id);
            $resort=$resort->name;
        }

//dd($resort);
        if (auth()->user()->user_type === 'admin') {
            if ($resort_id) {
                $bookings = Booking::with('room')
                    ->where('resort_id', $resort_id)
                    ->whereBetween('arrive', [$date['from'], $date['to']])
                    ->orderBy('id', 'desc')->get();
            } else {
                $bookings = Booking::with('room')
                    ->whereBetween('arrive', [$date['from'], $date['to']])
                    ->orderBy('id', 'desc')->get();
            }

        } else {
            $bookings = Booking::with('room')
                ->where('resort_id', auth()->user()->resort_id)
                ->whereBetween('arrive', [$date['from'],$date['to']])
                ->orderBy('id', 'desc')->get();
        }

        return view('backend.layouts.booking.list-print', compact('bookings', 'resort','date'));
    }
}
