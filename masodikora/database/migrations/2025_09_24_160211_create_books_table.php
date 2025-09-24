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
            $table->integer('pieces');
            $table->timestamps();
        });
    
        Book::create([
            "author" => "Bukfenc",
            "title" => "Tizenkét kutyaszabály az élethez",
            "pieces" => 12
        ]);
    
        Book::create([
            "author" => "Kertész Géza",
            "title" => "A nagymenő",
            "pieces" => 5
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
