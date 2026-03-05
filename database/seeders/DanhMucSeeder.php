<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $danhmucs = [
            // === Thực phẩm khô ===
            [
                'ten_danh_muc' => 'Gạo', 
                'mo_ta' => 'Các loại gạo tẻ, gạo nếp, gạo lứt, gạo thơm thượng hạng từ các vùng miền.'
            ],
            [
                'ten_danh_muc' => 'Ngũ cốc', 
                'mo_ta' => 'Ngũ cốc ăn sáng, yến mạch, granola và các loại hạt dinh dưỡng tốt cho sức khỏe.'
            ],
            [
                'ten_danh_muc' => 'Mì', 
                'mo_ta' => 'Mì gói, mì trứng, mì Ý (Spaghetti) và các loại mì nhập khẩu đa dạng.'
            ],
            [
                'ten_danh_muc' => 'Bún', 
                'mo_ta' => 'Bún gạo khô, bún tươi sấy khô tiện lợi, dễ dàng chế biến.'
            ],
            [
                'ten_danh_muc' => 'Phở khô', 
                'mo_ta' => 'Bánh phở khô dai ngon, chuẩn vị truyền thống cho món phở tại nhà.'
            ],
            [
                'ten_danh_muc' => 'Gia vị', 
                'mo_ta' => 'Muối, đường, hạt nêm, bột ngọt, tiêu và các gói gia vị hoàn chỉnh.'
            ],
            [
                'ten_danh_muc' => 'Nước chấm', 
                'mo_ta' => 'Nước mắm, nước tương, tương ớt, dầu hào và các loại xốt chấm đậm đà.'
            ],
            [
                'ten_danh_muc' => 'Đồ hộp', 
                'mo_ta' => 'Cá hộp, thịt hộp, pate và các loại rau củ đóng hộp tiện lợi.'
            ],
            [
                'ten_danh_muc' => 'Xúc xích', 
                'mo_ta' => 'Xúc xích tiệt trùng, xúc xích tươi và các loại thịt nguội chế biến sẵn.'
            ],

            // === Bánh kẹo ===
            [
                'ten_danh_muc' => 'Bánh ngọt', 
                'mo_ta' => 'Bánh bông lan, bánh quy, bánh pie và các loại bánh ngọt thơm ngon.'
            ],
            [
                'ten_danh_muc' => 'Bánh mì', 
                'mo_ta' => 'Bánh mì sandwich, bánh mì tươi sản xuất trong ngày.'
            ],
            [
                'ten_danh_muc' => 'Kẹo', 
                'mo_ta' => 'Kẹo dẻo, kẹo cứng, kẹo ngậm ho và kẹo trái cây các loại.'
            ],
            [
                'ten_danh_muc' => 'Socola', 
                'mo_ta' => 'Socola đen, socola sữa, socola hạt nhập khẩu và nội địa.'
            ],
            [
                'ten_danh_muc' => 'Snack', 
                'mo_ta' => 'Snack khoai tây, snack mực và các món ăn vặt giòn tan.'
            ],
            [
                'ten_danh_muc' => 'Bim bim', 
                'mo_ta' => 'Các loại bim bim hương vị đa dạng, món khoái khẩu cho mọi lứa tuổi.'
            ],
            [
                'ten_danh_muc' => 'Hạt dinh dưỡng', 
                'mo_ta' => 'Hạt điều, hạnh nhân, óc chó, mắc ca sấy khô tự nhiên.'
            ],

            // === Tươi sống ===
            [
                'ten_danh_muc' => 'Thịt', 
                'mo_ta' => 'Thịt heo, thịt bò, thịt gà tươi sống, đảm bảo vệ sinh an toàn thực phẩm.'
            ],
            [
                'ten_danh_muc' => 'Hải sản', 
                'mo_ta' => 'Tôm, cá, mực, ngao, sò tươi sống đánh bắt trong ngày.'
            ],
            [
                'ten_danh_muc' => 'Rau', 
                'mo_ta' => 'Rau xanh, rau gia vị, rau ăn lá đạt chuẩn VietGAP.'
            ],
            [
                'ten_danh_muc' => 'Củ', 
                'mo_ta' => 'Khoai tây, cà rốt, khoai lang và các loại củ quả tươi ngon.'
            ],
            [
                'ten_danh_muc' => 'Trái cây', 
                'mo_ta' => 'Trái cây nhiệt đới, trái cây nhập khẩu tươi ngon theo mùa.'
            ],
            [
                'ten_danh_muc' => 'Trứng', 
                'mo_ta' => 'Trứng gà, trứng vịt, trứng cút tươi mới mỗi ngày.'
            ],
            [
                'ten_danh_muc' => 'Sữa', 
                'mo_ta' => 'Sữa tươi, sữa chua, sữa hạt và các chế phẩm từ sữa.'
            ],

            // === Đồ uống ===
            [
                'ten_danh_muc' => 'Nước', 
                'mo_ta' => 'Nước khoáng, nước tinh khiết, nước ngọt có ga và nước ép trái cây.'
            ],
            [
                'ten_danh_muc' => 'Bia - Rượu', 
                'mo_ta' => 'Các loại bia lon, bia chai và rượu vang, rượu mạnh nhập khẩu.'
            ],
            [
                'ten_danh_muc' => 'Cafe - Trà', 
                'mo_ta' => 'Cà phê rang xay, cà phê hòa tan, trà túi lọc và trà lá khô.'
            ],
        ];

        DB::table('danh_mucs')->insert($danhmucs);
    }
}