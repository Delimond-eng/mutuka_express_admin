<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarLocationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_location_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("costumer_id");
            $table->unsignedBigInteger("vehicule_id");
            $table->date("pick_up_date")->nullable();
            $table->string("pick_up_area")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_location_requests');
    }
}
