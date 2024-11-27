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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            /**
             * Add polymorphic columns for a morph relationship.
             *
             * This method will add an unsigned integer column named 'likeable_id'
             * and a string column named 'likeable_type' to the table. These columns
             * are used to establish a polymorphic relationship, allowing the table
             * to reference multiple other tables.
             */
            $table->morphs('likeable');
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
        Schema::dropIfExists('likes');
    }
};
