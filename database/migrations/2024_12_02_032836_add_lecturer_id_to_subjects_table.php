<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLecturerIdToSubjectsTable extends Migration
{
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('lecturer_id')->nullable()->after('id'); // Adds lecturer_id column
            $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade'); // Adds foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['lecturer_id']); // Drops foreign key
            $table->dropColumn('lecturer_id');    // Drops the column
        });
    }
}
