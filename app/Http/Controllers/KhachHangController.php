<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\MasterMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KhachHangController extends Controller
{
    // =========================================================================
    // KHU VỰC ADMIN QUẢN LÝ
    // =========================================================================

    public function getData()
    {
        return response()->json([
            'data' => KhachHang::all()
        ]);
    }

    // 1. ADMIN THÊM KHÁCH HÀNG (Có Validate)
    public function addData(Request $request)
    {
        // Sử dụng Validator thủ công để tùy chỉnh thông báo lỗi dễ hơn
        $validator = Validator::make($request->all(), [
            'ho_va_ten'     => 'required|string|max:255',
            'email'         => [
                'required',
                'email',
                'unique:khach_hangs,email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/' // Bắt buộc đuôi @gmail.com
            ],
            'so_dien_thoai' => ['required', 'regex:/^0[0-9]{9}$/'], // Bắt đầu bằng 0, tổng 10 số
            'password'      => 'required|min:6',
            'ngay_sinh'     => 'required|date',
        ], [
            'email.regex'           => 'Email phải có định dạng @gmail.com',
            'email.unique'          => 'Email này đã tồn tại trong hệ thống',
            'so_dien_thoai.regex'   => 'Số điện thoại không hợp lệ (Phải có 10 số và bắt đầu bằng 0)',
            'password.min'          => 'Mật khẩu phải có ít nhất 6 ký tự'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        KhachHang::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'      => Hash::make($request->password), // Nên hash password
            'ngay_sinh'     => $request->ngay_sinh,
            'is_block'      => 0,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm khách hàng ' . $request->ho_va_ten . ' thành công',
        ]);
    }

    // 2. ADMIN CẬP NHẬT KHÁCH HÀNG (Có Validate)
    public function upDate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ho_va_ten'     => 'required|string|max:255',
            'email'         => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'unique:khach_hangs,email,' . $request->id // Cho phép trùng email chính mình
            ],
            'so_dien_thoai' => ['required', 'regex:/^0[0-9]{9}$/'],
            'ngay_sinh'     => 'required|date',
        ], [
            'email.regex'         => 'Email phải có định dạng @gmail.com',
            'email.unique'        => 'Email đã được sử dụng bởi người khác',
            'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $dataUpdate = [
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh'     => $request->ngay_sinh,
            'is_block'      => $request->is_block,
        ];

        // Nếu có nhập password mới thì mới cập nhật (và hash)
        if ($request->password) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        KhachHang::where('id', $request->id)->update($dataUpdate);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật khách hàng thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        KhachHang::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa khách hàng thành công',
        ]);
    }


    // =========================================================================
    // KHU VỰC CLIENT (ĐĂNG KÝ, ĐĂNG NHẬP...)
    // =========================================================================

    // 3. ĐĂNG KÝ (Có Validate chặt chẽ)
    public function dangKy(Request $request)
    {
        // 1. Định nghĩa luật kiểm tra (Rules)
        $rules = [
            'ho_va_ten'     => 'required|string|max:255',
            'email'         => [
                'required',
                'email',
                'unique:khach_hangs,email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/' // Luật: Phải là đuôi @gmail.com
            ],
            'so_dien_thoai' => [
                'required', 
                'regex:/^0[0-9]{9}$/' // Luật: Bắt đầu bằng 0, đủ 10 số
            ],
            'dia_chi'       => 'required|string',
            'ngay_sinh'     => 'required|date',
            'password'      => 'required|min:6'
        ];

        // 2. Định nghĩa thông báo lỗi cụ thể (Messages) - "Sai đâu báo đó"
        $messages = [
            'ho_va_ten.required'    => 'Họ và tên không được để trống.',
            
            'email.required'        => 'Email không được để trống.',
            'email.email'           => 'Email không đúng định dạng.',
            'email.unique'          => 'Email này đã được đăng ký, vui lòng dùng email khác.',
            'email.regex'           => 'Hệ thống chỉ chấp nhận email có đuôi @gmail.com.',
            
            'so_dien_thoai.required'=> 'Số điện thoại không được để trống.',
            'so_dien_thoai.regex'   => 'Số điện thoại không hợp lệ (Phải bắt đầu bằng số 0 và có 10 chữ số).',
            
            'dia_chi.required'      => 'Địa chỉ không được để trống.',
            
            'ngay_sinh.required'    => 'Vui lòng chọn ngày sinh.',
            
            'password.required'     => 'Mật khẩu không được để trống.',
            'password.min'          => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];

        // 3. Thực hiện kiểm tra
        $validator = Validator::make($request->all(), $rules, $messages);

        // 4. Nếu có lỗi, trả về lỗi đầu tiên gặp phải
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first() // Lấy câu thông báo lỗi cụ thể ở trên
            ]);
        }

        // --- NẾU KHÔNG CÓ LỖI THÌ TIẾP TỤC TẠO TÀI KHOẢN ---
        
        $key = Str::uuid();

        $khachHang = KhachHang::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'avatar'        => 'https://dimensions.edu.vn/public/upload/2025/01/avatar-meo-vo-tri-10.webp',
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'      => Hash::make($request->password),
            'dia_chi'       => $request->dia_chi,
            'ngay_sinh'     => $request->ngay_sinh,
            'is_block'      => 0,
            'is_active'     => 0,
            'hash_active'   => $key,
        ]);

        // Gửi mail (bỏ qua try-catch để code gọn, thực tế nên giữ)
        try {
            $tieu_de = "Kích hoạt tài khoản GreenMart";
            $view = "kichHoatTK";
            $noi_dung = [
                'ho_va_ten' => $khachHang->ho_va_ten,
                'link' => "http://localhost:5173/client/kich-hoat/" . $key
            ];
            Mail::to($request->email)->send(new MasterMail($tieu_de, $view, $noi_dung));
        } catch (\Exception $e) {}

        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công! Vui lòng kiểm tra email để kích hoạt.'
        ]);
    }

    public function kichHoat(Request $request)
    {
        $user = KhachHang::where('hash_active', $request->hash_active)->first();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Mã kích hoạt không hợp lệ']);
        }
        $user->update(['is_active' => 1]);
        return response()->json(['status' => true, 'message' => 'Đã kích hoạt tài khoản thành công']);
    }

    public function dangNhap(Request $request)
    {
        // Đăng nhập chỉ cần check đủ field, không cần check định dạng quá kỹ
        $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ]);

        $user = KhachHang::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['status' => false, 'message' => 'Sai email hoặc mật khẩu']);
        }

        if ($user->is_active == 0) {
            return response()->json(['status' => false, 'message' => 'Tài khoản chưa được kích hoạt']);
        }
        
        if ($user->is_block == 1) {
            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn đã bị khóa']);
        }

        $token = $user->createToken('key_client')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Đăng nhập thành công',
            'token' => $token,
            'key_client' => $token
        ]);
    }

    // =========================================================================
    // KHU VỰC THÔNG TIN CÁ NHÂN (PROFILE)
    // =========================================================================

    public function thongTinNguoiDung()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user instanceof KhachHang) {
            return response()->json(['data' => $user]);
        }
        return response()->json(['status' => false, 'message' => 'Không tìm thấy thông tin']);
    }

    public function checkClient()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            return response()->json([
                'status' => true,
                'ho_ten' => $user->ho_va_ten,
                'email'  => $user->email
            ]);
        }
        return response()->json(['status' => false, 'message' => 'Vui lòng đăng nhập']);
    }

    public function dangXuat(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['status' => true, 'message' => 'Đăng xuất thành công']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Lỗi đăng xuất']);
        }
    }

    public function getProfile()
    {
        $client = Auth::guard('sanctum')->user();
        return response()->json(['status' => true, 'data' => $client]);
    }

    // 4. CẬP NHẬT PROFILE (Có Validate)
    public function updateProfile(Request $request)
    {
        /** @var \App\Models\KhachHang $client */
        $client = Auth::guard('sanctum')->user();

        if (!$client) {
            return response()->json(['status' => false, 'message' => 'Vui lòng đăng nhập'], 401);
        }

        $validator = Validator::make($request->all(), [
            'ho_va_ten'     => 'required|string|max:255',
            'email'         => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'unique:khach_hangs,email,' . $client->id // Trừ chính mình ra
            ],
            'so_dien_thoai' => ['required', 'regex:/^0[0-9]{9}$/'],
            'dia_chi'       => 'nullable|string'
        ], [
            'email.regex'         => 'Email phải có đuôi @gmail.com',
            'email.unique'        => 'Email này đã được sử dụng',
            'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $client->update([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi'       => $request->dia_chi,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Cập nhật thông tin thành công',
            'data'    => $client
        ]);
    }
    public function timKiem(Request $request)
    {
        $tu_khoa = $request->noi_dung;

        // 1. Tạo Query cơ bản
        $query = DB::table('khach_hangs')
            ->select(
                'id', 
                'ho_va_ten', 
                'email', 
                'so_dien_thoai', 
                'ngay_sinh', 
                'password', // Nếu cần hiển thị (thường thì không nên gửi pass về FE)
                'is_active', 
                'is_block'
            );

        // 2. Logic tìm kiếm (Chỉ chạy khi có từ khóa)
        if (!empty($tu_khoa)) {
            $query->where(function ($q) use ($tu_khoa) {
                // Tìm theo Tên: Dùng REGEXP (chính xác từ)
                $q->whereRaw("ho_va_ten REGEXP ?", ["[[:<:]]{$tu_khoa}[[:>:]]"])
                
                // Tìm theo Email: Dùng LIKE (tìm gần đúng)
                ->orWhere('email', 'like', "%{$tu_khoa}%")
                
                // Tìm theo SĐT: Dùng LIKE (tìm số đuôi, đầu...)
                ->orWhere('so_dien_thoai', 'like', "%{$tu_khoa}%");
            });
        }

        // 3. Lấy dữ liệu và sắp xếp mới nhất lên đầu
        $data = $query->orderBy('id', 'desc')->get();

        return response()->json([
            'status'  => true,
            'data'    => $data,
            'message' => 'Tìm thấy ' . count($data) . ' khách hàng.'
        ]);
    }
}