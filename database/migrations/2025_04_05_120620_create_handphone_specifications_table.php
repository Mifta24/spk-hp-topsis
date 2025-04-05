_specifications_table.php
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
        Schema::create('handphone_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('handphone_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('processor_name')->nullable();
            $table->string('camera_detail')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('ram_size')->nullable();
            $table->string('storage_size')->nullable();
            $table->string('screen_size')->nullable();
            $table->string('os_version')->nullable();
            $table->string('network')->nullable();
            $table->string('sim')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->json('colors')->nullable();
            $table->json('features')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handphone_specifications');
    }
};
