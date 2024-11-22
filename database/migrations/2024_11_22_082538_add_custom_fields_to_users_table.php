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
        Schema::table('users', function (Blueprint $table) {
            // Voeg de 'team_id' kolom toe als een foreign key
            $table->unsignedBigInteger('team_id')->nullable()->after('remember_token');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('set null');

            // Voeg de 'role' kolom toe als een enum
            $table->enum('role', ['user', 'referee', 'admin'])->default('user')->after('team_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Verwijder de foreign key en de kolom 'team_id'
            $table->dropForeign(['team_id']);
            $table->dropColumn('team_id');

            // Verwijder de 'role' kolom
            $table->dropColumn('role');
        });
    }
};
