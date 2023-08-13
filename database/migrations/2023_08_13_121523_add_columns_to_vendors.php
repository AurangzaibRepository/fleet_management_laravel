<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('contact_name', 100);
            $table->string('latitude');
            $table->string('longitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn('contact_name');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
    }
}
