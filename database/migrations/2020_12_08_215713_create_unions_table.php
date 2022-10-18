<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('upazila_id');
            $table->string('name', 30);
            $table->string('bn_name', 50)->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
            $table->softDeletes();

//            $table->foreign('upazila_id')
//                ->references('id')->on('upazilas')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unions');
    }
}
