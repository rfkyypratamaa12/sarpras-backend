// database/migrations/YYYY_MM_DD_HHMMSS_add_quantity_to_items_table.php
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
        Schema::table('items', function (Blueprint $table) {
            $table->integer('quantity')->default(0)->after('nama_kolom_sebelumnya'); // Sesuaikan 'nama_kolom_sebelumnya'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};