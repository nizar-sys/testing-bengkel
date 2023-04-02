<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bengkel_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bengkel_id');
            $table->string('path');
            $table->timestamps();

            $table->foreign('bengkel_id')->references('id')->on('bengkels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bengkel_photos');
    }
};
