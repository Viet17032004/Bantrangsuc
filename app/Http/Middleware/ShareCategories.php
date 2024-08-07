<?php

namespace App\Http\Middleware;

use App\Models\DanhMuc;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy tất cả danh mục
        $categories = DanhMuc::all();

        // Chia sẻ danh mục với tất cả các view
        view()->share('categories', $categories);
        return $next($request);
    }
}
