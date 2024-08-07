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
            //
            $table->unsignedBigInteger('chuc_vu_id')->nullable(); // Thêm cột chuc_vu_id
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vus'); // Thiết lập khóa ngoại tới bảng chuc_vus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['chuc_vu_id']); // Xóa khóa ngoại
            $table->dropColumn('chuc_vu_id'); // Xóa cột chuc_vu_id
        });
    }
};
