<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Book;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->longText('title');
            
            $table->timestamps();
        });
    
        Book::create([
            "author" => "Bukfenc",
            "title" => "Tizenkét kutyaszabály az élethez",
            
        ]);
    
        Book::create([
            "author" => "Kertész Géza",
            "title" => "A nagymenő",
            
        ]);

    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
