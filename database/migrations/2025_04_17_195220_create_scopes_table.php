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
    Schema::create('scopes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('program_id')->constrained()->onDelete('cascade');
        $table->string('target');
        $table->enum('target_type', [
            'web',
            'mobile',
            'api',
            'cloud',
            'other'
        ]);        $table->enum('type', ['in', 'out']);
        $table->text('instructions')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scopes');
    }
};
