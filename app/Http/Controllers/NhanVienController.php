<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NhanVienController extends Controller
{
    public function dangNhap(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $nhanVien = NhanVien::where('email', $request->email)->first();

        if (!$nhanVien || !Hash::check($request->password, $nhanVien->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Email hoặc mật khẩu không đúng.',
            ], 401);
        }

        // Lấy role slug
        $role = $nhanVien->chucVu->slug_chuc_vu;

        // Lấy quyền tĩnh từ config
        $scopes = config("quyen.$role", []);

        // Tạo token theo scope
        $token = $nhanVien->createToken('api_token', $scopes)->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Đăng nhập thành công',
            'ho_ten'  => $nhanVien->ho_va_ten,
            'quyen'   => $scopes,
            'token'   => $token,
        ]);
    }

    public function checkQuyen(Request $request, $slugChucNang)
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn chưa đăng nhập.',
            ], 401);
        }

        // Lấy role từ chuc vu
        $role = $user->chucVu->slug_chuc_vu;

        // Lấy danh sách quyền từ config/quyen.php
        $quyenList = config("quyen.$role", []);

        if (in_array($slugChucNang, $quyenList)) {
            return response()->json([
                'status' => true,
                'message' => 'Bạn có quyền truy cập.',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Bạn không có quyền truy cập chức năng này.',
        ], 403);
    }

    public function checkAdmin()
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập.'
            ], 403);
        }

        return response()->json([
            'status' => true,
            'ho_ten' => $user->ho_va_ten,
            'avatar' => $user->avatar,
        ]);
    }
    public function getData()
    {
        // Xóa điều kiện where đi để lấy tất cả
        $nhanVien = NhanVien::orderBy('id', 'desc')->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy danh sách nhân viên thành công',
            'data'    => $nhanVien
        ]);
    }
    public function search(Request $request)
    {
        $noiDung = $request->noi_dung;

        $data = NhanVien::where('ho_va_ten', 'LIKE', "%$noiDung%")
            ->orWhere('email', 'LIKE', "%$noiDung%")
            ->orWhere('so_dien_thoai', 'LIKE', "%$noiDung%")
            ->get();

        return response()->json([
            'status'  => true,
            'message' => "Tìm kiếm thành công!",
            'data'    => $data
        ]);
    }
    public function themNhanVien(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ho_va_ten'     => 'required|string|max:255',
            'email'         => 'required|email|unique:nhan_viens,email',
            'password'      => 'required|min:6',
            'so_dien_thoai' => 'required',
            'cccd' => 'required',
            'ngay_sinh'     => 'required|date',
            'id_chuc_vu'    => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        NhanVien::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'so_dien_thoai' => $request->so_dien_thoai,
            'cccd'          => $request->cccd,
            'ngay_sinh'     => $request->ngay_sinh,
            'id_chuc_vu'    => $request->id_chuc_vu,
            'tinh_trang'    => 1, // mặc định đang làm
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Thêm nhân viên thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $nhanVien = NhanVien::find($request->id);

        if (!$nhanVien) {
            return response()->json([
                'status' => false,
                'message' => 'Nhân viên không tồn tại!'
            ], 404);
        }

        $nhanVien->update([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'cccd'          => $request->cccd,
            'ngay_sinh'     => $request->ngay_sinh,
            'id_chuc_vu'    => $request->id_chuc_vu,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }
    public function destroy(Request $request)
    {
        $nhanVien = NhanVien::find($request->id);

        if (!$nhanVien) {
            return response()->json([
                'status' => false,
                'message' => 'Nhân viên không tồn tại!'
            ], 404);
        }

        $nhanVien->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa thành công!'
        ]);
    }
    public function doiTrangThai(Request $request)
    {
        $nhanVien = NhanVien::find($request->id);

        if (!$nhanVien) {
            return response()->json([
                'status' => false,
                'message' => 'Nhân viên không tồn tại!'
            ]);
        }

        $nhanVien->tinh_trang = $nhanVien->tinh_trang == 1 ? 0 : 1;
        $nhanVien->save();

        return response()->json([
            'status' => true,
            'message' => 'Đổi trạng thái thành công!'
        ]);
    }
}
