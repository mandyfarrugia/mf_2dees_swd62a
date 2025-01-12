<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2, true); //Since it would not make sense to have a negative price, attribute can be unsigned.
            $table->date('release_date')->nullable(); //It might not always be known the date in which the item was released.
            $table->string('description')->nullable(); //Not every item will have a description (or at least not right away), hence leaving it optional is the best way to go.
            $table->string('image_path')->nullable(); //It might not always be the case that an item comes with an image, hence the nullable column definition.
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};