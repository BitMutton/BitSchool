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
        Schema::table('academic_years', function (Blueprint $table) {
            // Add created_by, updated_by, deleted_at
            if (!Schema::hasColumn('academic_years', 'created_by')) {
                $table->unsignedBigInteger('created_by')->nullable()->after('status');
            }

            if (!Schema::hasColumn('academic_years', 'updated_by')) {
                $table->unsignedBigInteger('updated_by')->nullable()->after('created_by');
            }

            if (!Schema::hasColumn('academic_years', 'deleted_at')) {
                $table->softDeletes()->after('updated_by');
            }

            // Optional: make status ENUM with default 'upcoming'
            $table->enum('status', ['active', 'archived', 'upcoming'])
                  ->default('upcoming')
                  ->change();

            // Add foreign key constraints for created_by / updated_by if needed
            $table->foreign('created_by')->references('id')->on('staff')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('staff')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_years', function (Blueprint $table) {
            if (Schema::hasColumn('academic_years', 'created_by')) {
                $table->dropForeign(['created_by']);
                $table->dropColumn('created_by');
            }

            if (Schema::hasColumn('academic_years', 'updated_by')) {
                $table->dropForeign(['updated_by']);
                $table->dropColumn('updated_by');
            }

            if (Schema::hasColumn('academic_years', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};

