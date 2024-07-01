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
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the user_catalogue_id column
            $table->unsignedBigInteger('user_catalogue_id')->default(6)->after('id');

            // Add a foreign key constraint if you have a user_catalogues table
            $table->foreign('user_catalogue_id')
                ->references('id')
                ->on('user_catalogues')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['user_catalogue_id']);

            $table->dropColumn('user_catalogue_id');
        });
    }
};
