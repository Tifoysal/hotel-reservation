<?php

namespace App\Models;

use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded=[];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function divi()
    {
        return $this->belongsTo(Division::class,'division','id');
    }

    public function dis()
    {
        return $this->belongsTo(District::class,'district','id');
    }
    public function thana()
    {
        return $this->belongsTo(Thana::class,'upazila','id');
    }

    public function resort()
    {
        return $this->belongsTo(Resort::class);
    }
}
