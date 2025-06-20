<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('parks', function (Blueprint $table) {
            $table->string('doc_path')->nullable()->after('obser'); // Ruta del PDF (opcional)
        });
    }

    public function down()
    {
        Schema::table('parks', function (Blueprint $table) {
            $table->dropColumn('doc_path');
        });
    }
};
