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
        Schema::create('advisor_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('advisor_id');
            $table->string('reject_reason')->nullable();
            $table->enum('advisor_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->enum('committee_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('advisor_id')->references('id')->on('advisors')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advisor_requests');
    }
};
