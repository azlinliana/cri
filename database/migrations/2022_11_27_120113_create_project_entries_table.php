<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title_entry');
            $table->string('cluster_id');
            $table->string('summary_of_invention');
            $table->enum('applicant_consent', ['agree', 'disagree']);
            $table->enum('status', ['draft', 'pending', 'accepted', 'rejected']);
            $table->string('reason')->nullable();
            $table->string('reviewer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_entries');
    }
};
