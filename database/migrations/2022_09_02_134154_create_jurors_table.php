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
        Schema::create('jurors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('admin_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('organization');
            $table->string('faculty');
            $table->string('field_of_study');
            $table->string('expertise');
            $table->string('cv');
            $table->enum('status', ['pending', 'approved', 'rejected']);
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
        Schema::dropIfExists('jurors');
    }
};
