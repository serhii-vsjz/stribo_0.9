<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_cost', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('cost_id');
            $table->float('contains', 8, 3)->default(1);
            $table->float('proportion')->default(1);
            $table->boolean('coefficient')->default(false);
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
        Schema::dropIfExists('price_cost');
    }
}
