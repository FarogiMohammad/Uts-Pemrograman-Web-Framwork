<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false);
            $table->text('description');
            $table->integer('price')->unsigned()->nullable(false);
            $table->string('image', 255);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->date('expired_at')->nullable(false);
            $table->string('modified_by', 255)->comment('email user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
