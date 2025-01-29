<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParfaitsTable extends Migration
{
    public function up()
    {
        Schema::create('parfaits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category')->nullable(); // Optional
            $table->string('technologies')->nullable(); // Optional
            $table->string('image')->nullable(); // Optional
            $table->string('github_link')->nullable(); // Optional
            $table->string('live_link')->nullable(); // Optional
            $table->boolean('is_featured')->default(false); // Optional
            $table->integer('order')->default(0); // Optional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parfaits');
    }
}