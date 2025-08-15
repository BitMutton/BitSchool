<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('class_subjects', function (Blueprint $table) {
            // Prevent duplicates for the same class, subject, and teacher
            $table->unique(['class_id', 'subject_id', 'teacher_id'], 'unique_class_subject_teacher');

            // Add remarks for notes (optional)
            $table->string('remarks', 255)->nullable()->after('teacher_id');

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable()->after('remarks');
            $table->unsignedBigInteger('updated_by')->nullable()->after('created_by');

            // Soft deletes
            $table->softDeletes()->after('updated_at');

            // Composite index for faster timetable queries
            $table->index(['class_id', 'subject_id'], 'idx_class_subject');
        });
    }

    public function down(): void
    {
        Schema::table('class_subjects', function (Blueprint $table) {
            $table->dropUnique('unique_class_subject_teacher');
            $table->dropColumn(['remarks', 'created_by', 'updated_by', 'deleted_at']);
            $table->dropIndex('idx_class_subject');
        });
    }
};

