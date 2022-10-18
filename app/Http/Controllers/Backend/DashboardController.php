<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Resort;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $resorts=Resort::all();
        if (auth()->user()->user_type === 'admin') {
            $room_ids = Booking::select('room_id')
                ->whereDate('arrive', '<=', Carbon::today())
                ->whereDate('depart', '>', Carbon::today())
                ->groupBy('room_id')
                ->get()
                ->toArray();
//            $array=collect($bookedRoom)->map(function ($item,$array){
//                $array['room_id']=array_merge($item['room_id'],$array);
//                return $array;
//            });
            $roomArray = [];
            foreach ($room_ids as $book) {
                $roomArray[] = $book['room_id'];
            }
            $booked_room = Room::select('id', 'resort_id')->whereNotIn('id', $roomArray)->get();

            $total_booking = Booking::all();
            $total_room = Room::get();

            $total_user = User::all();
            $today_stay = Booking::select('id', 'resort_id')
                ->whereDate('arrive', '<=', Carbon::today())
                ->whereDate('depart', '>', Carbon::today())
                ->groupBy('resort_id', 'id')->get();
//            dd($today_stay[0]->resort);
        } else {
            $room_ids = Booking::select('room_id')
                ->where('resort_id', auth()->user()->resort_id)
                ->whereDate('arrive', '<=', Carbon::today())
                ->whereDate('depart', '>', Carbon::today())
                ->groupBy('room_id')
                ->get()
                ->toArray();
//            $array=collect($bookedRoom)->map(function ($item,$array){
//                $array['room_id']=array_merge($item['room_id'],$array);
//                return $array;
//            });
            $roomArray = [];
            foreach ($room_ids as $book) {
                $roomArray[] = $book['room_id'];
            }
            $booked_room = Room::select('id', 'resort_id')->whereNotIn('id', $roomArray)->get();

            $total_room = Room::where('resort_id', auth()->user()->resort_id)->get();

            $total_booking = Booking::where('resort_id',auth()->user()->resort_id)->get();
            $total_user = User::where('resort_id', auth()->user()->resort_id)->get();

            $today_stay = Booking::whereDate('arrive', '<=', Carbon::today())
                ->whereDate('depart', '>', Carbon::today())
                ->where('resort_id',auth()->user()->id)
               ->get();
        }
        return view('backend.layouts.dashboard',
            compact('resorts','total_booking', 'total_room', 'total_user', 'today_stay', 'booked_room'));
    }
}
