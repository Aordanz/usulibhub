<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim_nip')->nullable()->unique()->after('email');
            $table->string('role')->default('mahasiswa')->after('nim_nip');
            $table->string('fakultas')->nullable()->after('role');
            $table->string('phone')->nullable()->after('fakultas');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nim_nip', 'role', 'fakultas', 'phone']);
        });
    }
};
