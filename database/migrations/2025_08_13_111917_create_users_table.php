<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('username', 100)->unique();
            $table->string('password_hash', 255);
            $table->string('email', 255)->unique();
            $table->string('person_type', 20)->nullable();
            $table->unsignedBigInteger('person_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Add CHECK constraint for person_type
        DB::statement("
            ALTER TABLE users
            ADD CONSTRAINT chk_users_person_type
            CHECK (person_type IN ('staff', 'student', 'guardian'))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

