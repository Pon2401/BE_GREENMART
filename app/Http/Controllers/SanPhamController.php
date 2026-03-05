<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SanPham;


class SanPhamController extends Controller
{
    public function getData()
    {
        $sanpham = DB::table('san_phams')
            ->join('danh_mucs', 'san_phams.id_danh_muc', '=', 'danh_mucs.id')
            ->select(
                'san_phams.id',
                'san_phams.ten_san_pham',
                'san_phams.mo_ta',
                'san_phams.gia',
                'san_phams.so_luong',
                'san_phams.hinh_anh',
                'san_phams.don_vi',
                'danh_mucs.ten_danh_muc'
            )
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $sanpham
        ]);
    }
    public function chiTietSanPham($id)
    {
        $sanpham = DB::table('san_phams')
            ->join('danh_mucs', 'san_phams.id_danh_muc', '=', 'danh_mucs.id')
            ->select(
                'san_phams.id',
                'san_phams.ten_san_pham',
                'san_phams.mo_ta',
                'san_phams.gia',
                'san_phams.so_luong',
                'san_phams.hinh_anh',
                'san_phams.don_vi',
                'danh_mucs.ten_danh_muc'
            )
            ->where('san_phams.id', $id)
            ->first();

        if (!$sanpham) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm'
            ], 404);
        }

        return response()->json($sanpham);
    }
    public function addData(Request $request)
    {
        //  dữ liệu
        $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'id_danh_muc'  => 'required|exists:danh_mucs,id',
            'gia'          => 'required|numeric|min:0',
            'so_luong'     => 'required|integer|min:0',
            'don_vi'       => 'required|string|max:50',
            'mo_ta'        => 'nullable|string',
            'hinh_anh'     => 'nullable|string',
        ]);

        // Thêm sản phẩm mới
        $sanPham = SanPham::create([
            'ten_san_pham' => $request->ten_san_pham,
            'id_danh_muc'  => $request->id_danh_muc,
            'gia'          => $request->gia,
            'so_luong'     => $request->so_luong,
            'don_vi'       => $request->don_vi,
            'mo_ta'        => $request->mo_ta,
            'hinh_anh'     => $request->hinh_anh,
        ]);

        return response()->json([
            'message'  => 'Thêm sản phẩm thành công',
            'data'     => $sanPham,
        ], 201);
    }
    public function update(Request $request)
    {
        $sanPham = SanPham::where('id', $request->id)->first();

        if (!$sanPham) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm không tồn tại'
            ], 404);
        }

        $sanPham->update([
            'ten_san_pham' => $request->ten_san_pham,
            'mo_ta'        => $request->mo_ta,
            'gia'          => $request->gia,
            'so_luong'     => $request->so_luong,
            'don_vi'       => $request->don_vi,
            'hinh_anh'     => $request->hinh_anh,
            'id_danh_muc'  => $request->id_danh_muc, // đừng quên danh mục
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Cập nhật sản phẩm thành công',
            'data'    => $sanPham
        ]);
    }
    public function destroy(Request $request)
    {
        try {
            // Lấy id từ request
            $id = $request->id ?? null;

            if (!$id) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Thiếu ID sản phẩm'
                ], 400);
            }

            // Tìm sản phẩm
            $sanPham = SanPham::find($id);
            if (!$sanPham) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Không tìm thấy sản phẩm'
                ], 404);
            }


            $sanPham->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Xoá sản phẩm thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Lỗi xoá sản phẩm: ' . $e->getMessage()
            ], 500);
        }
    }
    public function search(Request $request)
    {
        $tu_khoa = $request->noi_dung;
    
        // 1. Tạo Query cơ bản (luôn Join để lấy tên danh mục)
        $query = DB::table('san_phams as sp')
            ->join('danh_mucs as dm', 'sp.id_danh_muc', '=', 'dm.id')
            ->select('sp.*', 'dm.ten_danh_muc');
    
        // 2. Nếu có từ khóa thì mới lọc
        if (!empty($tu_khoa)) {
            $query->where(function($subQuery) use ($tu_khoa) {
                $subQuery->whereRaw("sp.ten_san_pham REGEXP ?", ["[[:<:]]{$tu_khoa}[[:>:]]"])
                         ->orWhereRaw("dm.ten_danh_muc REGEXP ?", ["[[:<:]]{$tu_khoa}[[:>:]]"]);
            });
        }
    
        // 3. Lấy dữ liệu
        $data = $query->get();
    
        return response()->json([
            'status' => true,
            'data'   => $data,
            'message'=> 'Đã tìm thấy ' . count($data) . ' sản phẩm.'
        ]);
    }
}
