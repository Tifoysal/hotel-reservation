<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('resort_id');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('father_name',100);
            $table->string('mother_name',100);
            $table->string('mobile',20);
            $table->string('relative_mobile',20)->nullable();
            $table->string('arrive',50)->nullable();
            $table->string('depart',50)->nullable();
            $table->string('check_in',50)->nullable();
            $table->string('check_out',50)->nullable();
            $table->string('email',64)->nullable();
            $table->string('gender',16)->nullable();
            $table->string('nid_passport',100)->nullable();
            $table->string('division',100)->nullable();
            $table->string('district',100)->nullable();
            $table->string('upazila',100)->nullable();
            $table->string('union',100)->nullable();
            $table->text('image')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->integer('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('resort_id')->references('id')->on('resorts');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
