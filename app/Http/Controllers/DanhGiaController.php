<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    public function getData(Request $request)
    {
        $danhGia = DanhGia::with('khachHang')
            ->where('id_san_pham', $request->id_san_pham)
            ->orderBy('created_at', 'desc')
            ->get();
        $data = $danhGia->map(function ($item) {
            return [
                'id'         => $item->id,
                'so_sao'     => $item->so_sao,
                'noi_dung'   => $item->noi_dung,
                'created_at' => $item->created_at,
                'ho_va_ten'  => $item->khachHang->ho_va_ten ?? 'Khách hàng',
                'avatar'   => $item->khachHang->avatar ?? null,
            ];
        });

        return response()->json([
            'status' => true,
            'data'   => $data,
            'dem'    => $data->count(),
        ]);
    }

  public function create(Request $request)
{
    $user = Auth::guard('sanctum')->user();
    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'Bạn cần đăng nhập để đánh giá.'
        ]);
    }

    DanhGia::create([
        'id_khach_hang' => $user->id,
        'id_san_pham'   => $request->id_san_pham,
        'so_sao'        => $request->so_sao,
        'noi_dung'      => $request->noi_dung,
        'tinh_trang'    => 'hiển thị'
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Đánh giá thành công!'
    ]);
}

}
