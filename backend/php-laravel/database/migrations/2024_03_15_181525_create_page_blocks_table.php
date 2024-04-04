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
        Schema::create('page_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')
                ->constrained('pages')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('block_id')
                ->constrained('blocks')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('key');
            $table->integer('sort')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_blocks');
    }
};
