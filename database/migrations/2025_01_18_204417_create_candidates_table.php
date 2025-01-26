<?php

use App\Models\User;
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
        Schema::create('candidates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('picture');
            $table->string('elected_position');
            $table->string('election_district');
            $table->string('election_cycle');
            $table->string('source');
            $table->text('note')->nullable();

            $table->foreignUuid('verified_by')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->timestamps();

            $table->index('name');
            $table->index('email');
            $table->index('first_name');
            $table->index('last_name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
