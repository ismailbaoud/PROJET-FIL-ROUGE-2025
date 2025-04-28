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
        Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->string('companyName')->nullable();
        $table->string('companyUrl')->nullable();
        $table->text('country');
        $table->text('content_vusial')->default('avatars/hunter.jpeg');
        $table->string('state');
        $table->integer('pointes')->default(0);
        $table->integer('rewards')->default(0);
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
