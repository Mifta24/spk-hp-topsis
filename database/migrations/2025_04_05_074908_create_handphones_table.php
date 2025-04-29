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
        Schema::create('handphones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->after('id')->constrained()->onDelete('set null');
            $table->string('name');
              // Ubah tipe kolom price menjadi decimal dengan presisi 15,2
            // (mengakomodasi angka hingga 13 digit dengan 2 desimal)
            $table->decimal('price', 15, 2);
            // $table->integer('price'); untuk mysql
            $table->integer('camera');   // skor kamera 1-10
            $table->integer('battery');  // skor baterai 1-10
            $table->integer('ram');      // skor RAM 1-10
            $table->integer('prosessor'); // skor prosessor 1-10
            $table->integer('design');   // skor desain 1-10
            $table->integer('storage');  // skor penyimpanan 1-10
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the foreign key constraint first
        Schema::table('handphones', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);

        });
        // Then drop the table
        Schema::dropIfExists('handphones');
    }
};
