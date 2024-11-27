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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            /**
             * unsignedInteger('user_id'):
             * This method call adds a new column named user_id to the table.
             * The unsignedInteger method specifies that the column should store integer values that are non-negative (unsigned).
             * This is typically used for columns that will store IDs, especially when they are foreign keys referencing another table's primary key, which is often an auto-incrementing integer.
             */
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
