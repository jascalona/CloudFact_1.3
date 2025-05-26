<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parks', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('cliente');
            $table->string('rif');
            $table->string('serial')->unique();
            $table->string('model');
            $table->string('location');
            $table->string('city');
            $table->string('estado');
            $table->string('date_insta');
            $table->string('n_port');
            $table->string('cont_insta_bn');
            $table->string('cont_insta_color');
            $table->string('obser');
            $table->string('doc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parks');
    }
};
