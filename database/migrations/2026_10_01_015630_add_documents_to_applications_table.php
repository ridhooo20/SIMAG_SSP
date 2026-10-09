<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('company_document')->nullable()->after('cover_letter');
            $table->string('permission_letter')->nullable()->after('company_document');
            $table->string('portfolio')->nullable()->after('permission_letter');
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'company_document',
                'permission_letter',
                'portfolio',
            ]);
        });
    }
};