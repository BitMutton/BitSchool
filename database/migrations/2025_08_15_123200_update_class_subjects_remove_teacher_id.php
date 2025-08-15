<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('class_subjects', function (Blueprint $table) {
            // Drop the unique key first
            $table->dropUnique('unique_class_subject_teacher');

            // Drop the index on teacher_id if it exists
            $table->dropIndex('class_subjects_teacher_id_foreign');

            // Drop the teacher_id column
            $table->dropColumn('teacher_id');
        });
    }

    public function down(): void
    {
        Schema::table('class_subjects', function (Blueprint $table) {
            // Add the teacher_id column back
            $table->unsignedBigInteger('teacher_id')->after('subject_id');

            // Recreate the index
            $table->index('teacher_id', 'class_subjects_teacher_id_foreign');

            // Recreate the unique constraint
            $table->unique(['class_id', 'subject_id', 'teacher_id'], 'unique_class_subject_teacher');
        });
    }
};

