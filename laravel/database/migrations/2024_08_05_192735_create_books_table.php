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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // title VARCHAR(255)
            $table->string('thumbnail')->nullable(); // thumbnail VARCHAR(255)
            $table->string('author'); // author VARCHAR(255)
            $table->string('publisher'); // publisher VARCHAR(255)
            $table->date('publication'); // publication DATE
            $table->double('price', 8, 2); // price DOUBLE
            $table->integer('quantity'); // quantity INT
            $table->unsignedBigInteger('category_id'); // category_id UNSIGNED INT

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Foreign key constraint

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
