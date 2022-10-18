<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('resort_id');
            $table->string('number', 50);
            $table->string('type', 30);
            $table->string('is_ac', 100);
            $table->string('meal', 100);
            $table->string('cancellation_rate', 100);
            $table->string('bed_capacity', 100);
            $table->string('telephone', 100);
            $table->string('status', 10)->default('active');
            $table->string('rent', 100);
            $table->string('details', 100)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('rooms');
    }
}
