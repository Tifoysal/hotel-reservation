<?php

namespace App\Http\Controllers\Backend;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function create(Request $request)
    {
        Guest::create([
        'fullname'=>$request->fullname,
        'fathers_name'=>$request->fathers_name,
        'mothers_name'=>$request->mothers_name,
        'dob'=>$request->dob,
        'email'=>$request->email,
        'check_in'=>$request->check_in,
        'check_out'=>$request->check_out,
        ]);
    }
}
