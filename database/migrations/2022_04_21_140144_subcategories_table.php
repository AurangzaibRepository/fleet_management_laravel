<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sub_categories', function(Blueprint $table) {
            $table->id();
            $table->string('sub_category', 700);
            $table->string('introduction_text', 900);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->foreignId('category_id')->constrained();
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
}
