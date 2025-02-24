<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculeSellPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicule_sell_prices', function (Blueprint $table) {
            $table->id();
            $table->double("amount");
            $table->string("currencie")->default("USD");
            $table->unsignedBigInteger("vehicule_id");
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
        Schema::dropIfExists('vehicule_sell_prices');
    }
}
