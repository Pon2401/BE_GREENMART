<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function getData()
    {
        $danhmuc = DB::table('danh_mucs')
            ->select('id', 'ten_danh_muc', 'mo_ta')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $danhmuc
        ]);
    }
    public function addData(Request $request)
    {
        DB::table('danh_mucs')->insert([
            'ten_danh_muc' => $request->ten_danh_muc,
            'mo_ta'        => $request->mo_ta,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Thêm danh mục thành công'
        ]);
    }
    public function upDate(Request $request)
    {
        $danhMuc = DB::table('danh_mucs')
            ->where('id', $request->id) // nhận id chuẩn từ FE
            ->update([
                'ten_danh_muc' => $request->ten_danh_muc,
                'mo_ta'        => $request->mo_ta,
            ]);
    
        return response()->json([
            'status'  => $danhMuc > 0,
            'message' => $danhMuc > 0 ? 'Cập nhật danh mục thành công' : 'Không tìm thấy danh mục để cập nhật'
        ]);
    }
    public function timKiem(Request $request)
    {
        $tu_khoa = $request->noi_dung;

        // TRƯỜNG HỢP 1: Nếu không nhập gì -> Lấy toàn bộ danh sách
        if (empty($tu_khoa)) {
            $data = DB::table('danh_mucs')
                ->select('danh_mucs.*')
                ->get();
        } 
        // TRƯỜNG HỢP 2: Có nhập từ khóa -> Tìm kiếm
        else {
            $data = DB::table('danh_mucs')
                ->whereRaw("ten_danh_muc REGEXP ?", ["[[:<:]]{$tu_khoa}[[:>:]]"])
                ->orWhereRaw("mo_ta REGEXP ?", ["[[:<:]]{$tu_khoa}[[:>:]]"])
                ->select('danh_mucs.*')
                ->get();
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'message'=> 'Đã lấy dữ liệu thành công.'
        ]);
    }
}
