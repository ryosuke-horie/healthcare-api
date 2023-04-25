<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightsTable extends Migration
{
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->id();
            $table->float('weight');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weights');
    }
}
