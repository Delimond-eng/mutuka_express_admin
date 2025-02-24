<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculeSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicule_specifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("vehicule_id");
            $table->unsignedBigInteger("specification_id");
            $table->string("spec_value");
            $table->string("status")->default("actif");
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
        Schema::dropIfExists('vehicule_specifications');
    }
}
