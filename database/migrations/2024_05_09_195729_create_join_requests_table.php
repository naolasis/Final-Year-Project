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
        Schema::create('join_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
           // $table->unsignedBigInteger('group_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('sender_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('students')->onDelete('cascade');
           // $table->foreign('group_id')->references('group_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_requests');
    }
};
