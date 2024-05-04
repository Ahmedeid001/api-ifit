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
        Schema::create('json', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('primary_muscles');      
            $table->string('secondary_muscles');  
            $table->string('gifUrl');
            $table->string('rep');      
            $table->string('Rest_time'); 
            $table->longText('instructions');
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
