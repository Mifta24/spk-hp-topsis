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
            $table->integer('price');
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
