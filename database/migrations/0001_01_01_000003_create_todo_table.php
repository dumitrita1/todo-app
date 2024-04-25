<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('userId');
            $table->string('name');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('title');
            $table->string('description');
            $table->string('status');
            $table->string('duoDate')->nullable();
            $table->integer('userId')->index();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('lists');
        Schema::dropIfExists('tasks');
    }
};