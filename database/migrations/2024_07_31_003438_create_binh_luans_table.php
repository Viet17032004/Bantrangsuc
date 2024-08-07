<?php

use App\Models\SanPham;
use App\Models\User;
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
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            // Thêm khóa ngoại cho bảng tai_khoans
            $table->foreignIdFor(User::class)->constrained();
            // Thêm khóa ngoại cho bảng san_phams
            $table->foreignIdFor(SanPham::class)->constrained();
            $table->text('noi_dung');
            $table->timestamp('thoi_gian');
            $table->boolean('trang_thai')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
