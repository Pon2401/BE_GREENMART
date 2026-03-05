<?php

namespace App\Http\Controllers;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChiTietDonHangController extends Controller
{
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Bạn chưa đăng nhập'
            ], 401);
        }

        // Lấy đơn hàng (giỏ hàng)
        $cart = DonHang::where('id_khach_hang', $user->id)
            ->whereNull('ma_don_hang')
            ->first();

        // Nếu chưa có giỏ hàng thì tạo mới
        if (!$cart) {
            return response()->json([
                'cart' => null,
                'items' => []
            ]);
        }
        

        // Lấy chi tiết đơn hàng
        $items = ChiTietDonHang::where('id_don_hang', $cart->id)
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_hangs.id_san_pham')
            ->select(
                'chi_tiet_don_hangs.*',
                'san_phams.ten_san_pham',
                'san_phams.gia',
                'san_phams.hinh_anh',
                'san_phams.don_vi'
            )
            ->get();

        return response()->json([
            'cart'  => $cart,     // Trả về toàn bộ field của bảng don_hangs
            'items' => $items,    // Trả về đầy đủ field của chi_tiet_don_hangs
        ]);
    }
}
