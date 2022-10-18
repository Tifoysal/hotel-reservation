<?php

use App\Models\Resort;
use Illuminate\Database\Seeder;

class ResortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resort::create([
            'name'=>'Resort1',
            'address'=>'coxbazar',
            'mobile'=>'098765487',
        ]);
    }
}
