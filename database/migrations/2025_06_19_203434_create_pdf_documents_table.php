<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pdf_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre original del archivo
            $table->string('path'); // Ruta guardada en storage (ej: "pdfs/documento.pdf")
            $table->string('size')->nullable(); // Tamaño en KB/MB
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pdf_documents');
    }
};
