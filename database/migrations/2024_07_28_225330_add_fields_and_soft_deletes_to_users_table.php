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
            $table->string('anh_dai_dien')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('gioi_tinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->boolean('trang_thai')->default(true);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('anh_dai_dien');
            $table->dropColumn('so_dien_thoai');
            $table->dropColumn('gioi_tinh');
            $table->dropColumn('dia_chi');
            $table->dropColumn('ngay_sinh');
            $table->dropColumn('trang_thai');
            $table->dropSoftDeletes();
        });
    }
};
