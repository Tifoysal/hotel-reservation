<?php

namespace App\Http\Livewire;

use App\Models\Thana;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Devfaysal\BangladeshGeocode\Models\Division;
use Livewire\Component;


class AllDivision extends Component
{
    public $division;//division id
    public $divisions;
    public $districts=[];
    public $upazilas=[];
    public $upazila;
    public $district;

    public function mount()
    {
    $this->divisions=Division::all();

    }

    public function render()
    {

        if(!empty($this->division)) {
            $this->districts = District::where('division_id', $this->division)->get();
        $this->upazilas=[];
        }
        if(!empty($this->district)) {
            $this->upazilas = Thana::where('district_id', $this->district)->get();
        }

        return view('livewire.all-division');
    }
}
