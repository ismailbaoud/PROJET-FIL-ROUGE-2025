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
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('type');
        $table->string('target');
        $table->text('steps'); 
        $table->text('impact');
        $table->text('poc')->nullable(); 
        $table->decimal('reward')->default(0); 
        $table->integer('pointe')->default(0); 
        $table->enum('status', [
            'new',
            'triaged',
            'duplicate',
            'informative',
            'not_applicable',
            'not_reproducible',
            'resolved',
            'wont_fix',
            'spam'
        ])->default('new');
    
        $table->enum('severity', ['Low', 'Medium', 'High', 'Critical']); 
    
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('program_id')->constrained()->onDelete('cascade');
    
        $table->timestamps();
    });
    
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
