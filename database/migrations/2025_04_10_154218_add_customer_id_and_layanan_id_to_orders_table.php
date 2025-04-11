<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        if (!Schema::hasColumn('orders', 'customer_id')) {
            $table->unsignedBigInteger('customer_id')->after('id');
        }

        if (!Schema::hasColumn('orders', 'layanan_id')) {
            $table->unsignedBigInteger('layanan_id')->after('customer_id');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropForeign(['customer_id']);
        $table->dropForeign(['layanan_id']);
        $table->dropColumn(['customer_id', 'layanan_id']);
    });
}
};
