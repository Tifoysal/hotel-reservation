<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanas', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name', 50);
            $table->string('bn_name', 50)->nullable();
            $table->string('lat', 40)->nullable();
            $table->string('lon', 40)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('duty_officer_ext')->nullable();
            $table->string('dmp')->nullable();
            $table->string('tnt')->nullable();
            $table->string('cell')->nullable();
            $table->string('ii_cell', 30)->nullable()->description('Inspector Investigation Cell');
            $table->string('oic_dmp', 10)->nullable()->description('Officers In charge DMP');
            $table->string('oic_cell', 30)->nullable()->description('Officers In charge CELL');
            $table->string('oic_fax', 30)->nullable()->description('Officers In charge FAX');
            $table->string('oic_email', 30)->nullable()->description('Officers In charge EMAIL');
            $table->string('website')->nullable();
            $table->timestamps();
//            $table->softDeletes();

//            $table->foreign('district_id')
//                ->references('id')->on('districts')
//                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanas');
    }
}
