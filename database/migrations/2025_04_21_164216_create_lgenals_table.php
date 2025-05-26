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
        Schema::create('lgenals', function (Blueprint $table) {
            $table->string('client');
            $table->string('rif');
            $table->string('serial');
            $table->string('model');
            $table->string('location');
            $table->string('mes');
            $table->date('date');
            $table->integer('cont_ante_bn');
            $table->integer('cont_actu_bn');
            $table->integer('volum_bn');
            $table->integer('AMCV_bn');
            $table->integer('cont_ante_color');
            $table->integer('cont_actu_color');
            $table->integer('volum_color');
            $table->integer('AMCV_color');

            /**SERVICES SCAN FOR DEVELOP */
            $table->integer('cont_ante_scan_images');
            $table->integer('cont_actu_scan_images');
            $table->integer('volum_scan_images');

            $table->integer('cont_ante_scan_jobs');
            $table->integer('cont_actu_scan_jobs');
            $table->integer('volum_scan_jobs');

            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lgenals');
    }
};
