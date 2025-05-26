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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('rif')->unique();
            $table->string('tipo',6);
            $table->string('cant_device',10 );
            $table->string('p_contact',50);
            $table->string('p_email',100);
            $table->string('p_movil',15);
            $table->string('obser',500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
