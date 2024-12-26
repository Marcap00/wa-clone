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
            $table->string('phone_number')->unique()->nullable(false)->after('password');
            $table->string('biography')->nullable()->after('phone_number');
            $table->text('avatar')->nullable()->after('biography');
            $table->text('avatar_placeholder')->nullable()->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('biography');
            $table->dropColumn('avatar');
            $table->dropColumn('avatar_placeholder');
        });
    }
};
