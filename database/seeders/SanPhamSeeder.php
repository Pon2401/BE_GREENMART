<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    public function run(): void
    {
        // Danh sách thịt
        $thit = [
            [
                'ten_san_pham' => 'Ức Gà Phi Lê',
                'gia'          => 95,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://cdn.tgdd.vn/Products/Images/8790/222942/bhx/uc-ga-phi-le-co-da-202403011639007208.jpg',
                'id_danh_muc'  => 17,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Ức gà phi lê tươi, thịt mềm, giàu protein. Thích hợp nấu nhiều món hấp, chiên hoặc xào.'
            ],
            [
                'ten_san_pham' => 'Thịt Bò Mỹ',
                'gia'          => 320,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://foodlife.com.vn/wp-content/uploads/2019/10/topblade2.jpg',
                'id_danh_muc'  => 17,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Thịt bò Mỹ thượng hạng, đỏ tươi, mềm mịn. Phù hợp nướng, hầm hoặc xào nhanh.'
            ],
            [
                'ten_san_pham' => 'Sườn Heo',
                'gia'          => 135000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://gomeat.vn/upload/sanpham/suonbeheo-16252621938.jpg',
                'id_danh_muc'  => 17,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Sườn heo tươi, thịt chắc và ngọt. Thích hợp nướng, rim mặn hoặc nấu canh.'
            ],
            [
                'ten_san_pham' => 'Trâu Ấn Độ',
                'gia'          => 135000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://thucphamvanquy.com/wp-content/uploads/2022/06/b19-3-scaled.jpg',
                'id_danh_muc'  => 17,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Thịt trâu Ấn Độ, mềm và ít mỡ. Phù hợp xào, hầm hoặc làm bít tết.'
            ],
            [
                'ten_san_pham' => 'Thịt Dê',
                'gia'          => 180000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://hotel84.com/userfiles/image/nhahang/hanoi/NamDe/thit-de-song-namdeninhbinh.jpg',
                'id_danh_muc'  => 17,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Thịt dê tươi ngon, thơm và mềm. Thích hợp nướng, hấp hoặc nấu lẩu.'
            ],
            [
                'ten_san_pham' => 'Ba Chỉ Heo',
                'gia'          => 150000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://blog.organicfood.vn/wp-content/uploads/2023/02/5-bi-quyet-lam-thit-ba-chi-heo-ngon-va-dua-com-704x454.jpg',
                'id_danh_muc'  => 17,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Ba chỉ heo tươi, lớp mỡ vừa phải. Thích hợp quay, xào hoặc rim mặn.'
            ],
        ];
        // Danh sách hải sản
        $haiSan = [
            [
                'ten_san_pham' => 'Cá Hồi Phi Lê',
                'gia'          => 210000,
                'don_vi'       => '500g',
                'hinh_anh'     => 'https://bongon.vn/static/team/2017/1024/15088452186635.jpg',
                'id_danh_muc'  => 18,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cá hồi phi lê tươi, giàu omega-3. Phù hợp nướng, áp chảo hoặc làm sashimi.'
            ],
            [
                'ten_san_pham' => 'Tôm Sú',
                'gia'          => 180000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://tse2.mm.bing.net/th/id/OIP.Pb31oGYA9dz7bDV8NOqECAHaFS?pid=Api&P=0&h=180',
                'id_danh_muc'  => 18,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Tôm sú tươi, thịt chắc. Thích hợp nướng, hấp hoặc xào các món hải sản.'
            ],
            [
                'ten_san_pham' => 'Mực Ống',
                'gia'          => 195000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://vinmec-prod.s3.amazonaws.com/images/20200421_143315_028317_muc-ong.max-1800x1800.jpg',
                'id_danh_muc'  => 18,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Mực ống tươi, dày thịt và giòn. Phù hợp chiên giòn, xào hoặc hấp.'
            ],
            [
                'ten_san_pham' => 'Cua Cà Mau',
                'gia'          => 210000,
                'don_vi'       => '500g',
                'hinh_anh'     => 'https://tse1.mm.bing.net/th/id/OIP.5vQNaTUgStuZ4abLBKPb7wHaEo?pid=Api&P=0&h=180',
                'id_danh_muc'  => 18,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cua Cà Mau tươi, nhiều gạch, thịt chắc. Thích hợp hấp, luộc hoặc nấu canh.'
            ],
            [
                'ten_san_pham' => 'Cá Thu',
                'gia'          => 170000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://statics.vinpearl.com/ca-thu-03_1632822036.jpg',
                'id_danh_muc'  => 18,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cá thu tươi, thịt mềm và béo. Thích hợp nướng, kho hoặc hấp.'
            ],
            [
                'ten_san_pham' => 'Ghẹ Xanh',
                'gia'          => 220000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://haisan.online/wp-content/uploads/2022/01/ghe-xanh-6.jpg',
                'id_danh_muc'  => 18,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Ghẹ xanh tươi, thịt chắc, gạch nhiều. Thích hợp hấp, luộc hoặc nấu canh.'
            ],
        ];
        // Danh sách rau
        $rau = [
            [
                'ten_san_pham' => 'Rau Muống',
                'gia'          => 15000,
                'don_vi'       => 'bó',
                'hinh_anh'     => 'https://product.hstatic.net/200000423303/product/rau_muong_huu_co_c9a3ac40b83542158cc777090bee8441.png',
                'id_danh_muc'  => 19,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rau muống tươi xanh, giòn ngọt. Phù hợp luộc, xào tỏi hoặc nấu canh chua.'
            ],
            [
                'ten_san_pham' => 'Rau Cải Ngọt',
                'gia'          => 18000,
                'don_vi'       => 'bó',
                'hinh_anh'     => 'https://thucphamdongxanh.com/wp-content/uploads/2020/04/kham-pha-rau-cai-ngot-co-tac-dung-gi.jpg',
                'id_danh_muc'  => 19,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rau cải ngọt tươi non, vị ngọt nhẹ. Thích hợp nấu canh, xào hoặc ăn lẩu.'
            ],
            [
                'ten_san_pham' => 'Rau Cải Thìa',
                'gia'          => 20000,
                'don_vi'       => 'bó',
                'hinh_anh'     => 'https://nongsankhaianh.com/wp-content/uploads/2018/03/cai-thia.jpg',
                'id_danh_muc'  => 19,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rau cải thìa tươi, lá xanh, thân trắng. Dùng nấu canh, xào hoặc ăn kèm lẩu.'
            ],
            [
                'ten_san_pham' => 'Rau Cải Bó Xôi',
                'gia'          => 25000,
                'don_vi'       => 'bó',
                'hinh_anh'     => 'https://ihs.org.vn/wp-content/uploads/2020/10/cai-bo-xoi.jpg',
                'id_danh_muc'  => 19,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rau cải bó xôi giàu sắt và vitamin. Phù hợp làm salad, xào tỏi hoặc nấu súp.'
            ],
            [
                'ten_san_pham' => 'Rau Ngò',
                'gia'          => 10000,
                'don_vi'       => 'bó',
                'hinh_anh'     => 'https://cf.shopee.vn/file/6b5d69afbeca65046b130d23ae67600c',
                'id_danh_muc'  => 19,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rau ngò thơm dịu, thường dùng làm gia vị ăn kèm, trang trí món ăn hoặc nấu canh.'
            ],
            [
                'ten_san_pham' => 'Rau Diếp Cá',
                'gia'          => 12000,
                'don_vi'       => 'bó',
                'hinh_anh'     => 'https://suckhoedoisong.qltns.mediacdn.vn/Images/tuananh2/2021/06/25/1.jpg',
                'id_danh_muc'  => 19,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rau diếp cá tươi, vị chua nhẹ, thơm đặc trưng. Ăn sống, ép nước hoặc làm gỏi.'
            ],
            [
                'ten_san_pham' => 'Rau Tía Tô',
                'gia'          => 14000,
                'don_vi'       => 'bó',
                'hinh_anh'     => 'https://binhdienonline.com/thumbs_size/product/2021_02/tia-to/[1200x1200-cr]tia-to--8.jpg',
                'id_danh_muc'  => 19,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rau tía tô thơm, lá xanh tím. Dùng làm gia vị, ăn sống hoặc nấu cháo giải cảm.'
            ],
            [
                'ten_san_pham' => 'Rau Xà Lách',
                'gia'          => 22000,
                'don_vi'       => 'bó',
                'hinh_anh'     => 'https://tse1.mm.bing.net/th/id/OIP.SSLG8IQgbNlWfGCxA7r7-QHaHa?pid=Api&P=0&h=180',
                'id_danh_muc'  => 19,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rau xà lách giòn, mát. Dùng làm salad, ăn kèm các món cuốn hoặc burger.'
            ],
        ];
        // Danh sách củ
        $cu = [
            [
                'ten_san_pham' => 'Cà Rốt',
                'gia'          => 25000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://product.hstatic.net/200000240163/product/carot_e19007ce8f384061a09b133876b4db9a_master.jpg',
                'id_danh_muc'  => 20,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cà rốt tươi, giàu vitamin A. Phù hợp nấu canh, xào hoặc làm nước ép.'
            ],
            [
                'ten_san_pham' => 'Khoai Tây',
                'gia'          => 30000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://hongngochospital.vn/wp-content/uploads/2020/02/dinh-duong-tu-khoai-tay.jpg',
                'id_danh_muc'  => 20,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Khoai tây tươi, tinh bột dẻo. Phù hợp chiên, nghiền hoặc nấu súp.'
            ],
            [
                'ten_san_pham' => 'Khoai Lang',
                'gia'          => 28000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://images.baodantoc.vn/uploads/2022/Th%C3%A1ng%209/Ng%C3%A0y_19/Thanh/nguon-goc-cua-khoai-lang.jpg',
                'id_danh_muc'  => 20,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Khoai lang ngọt, dẻo bùi. Thích hợp luộc, nướng hoặc làm chè.'
            ],
            [
                'ten_san_pham' => 'Củ Dền',
                'gia'          => 32000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://tse3.mm.bing.net/th/id/OIP.v_paPhN5EU-sfJqojMPujQHaE8?pid=Api&P=0&h=180',
                'id_danh_muc'  => 20,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Củ dền đỏ, giàu sắt và vitamin. Phù hợp ép nước, hầm canh hoặc làm salad.'
            ],
            [
                'ten_san_pham' => 'Củ Sắn',
                'gia'          => 18000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://bacsitructuyen.com.vn/wp-content/uploads/2021/06/nhung-tac-dung-cua-cu-san.jpg',
                'id_danh_muc'  => 20,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Củ sắn giòn ngọt, mát. Thích hợp ăn sống hoặc làm gỏi.'
            ],
            [
                'ten_san_pham' => 'Củ Hành Tây',
                'gia'          => 27000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://suckhoedoisong.qltns.mediacdn.vn/thumb_w/640/324455921873985536/2022/10/27/01g39e8wa37frw0rkgq2-1666835432925-16668354332171757452862.jpg',
                'id_danh_muc'  => 20,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Hành tây tươi, thơm nồng. Dùng xào, nấu canh, kho hoặc làm salad.'
            ],
            [
                'ten_san_pham' => 'Củ Tỏi',
                'gia'          => 60000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://suckhoedoisong.qltns.mediacdn.vn/zoom/600_315/324455921873985536/2021/9/29/22d4816a7b2a9274cb3b-1632889024462920345868-0-0-625-1000-crop-1632889032163137211233.jpg',
                'id_danh_muc'  => 20,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Tỏi tươi, thơm cay. Dùng làm gia vị, ngâm rượu hoặc hỗ trợ tăng sức đề kháng.'
            ],
            [
                'ten_san_pham' => 'Củ Gừng',
                'gia'          => 55000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://ihs.org.vn/wp-content/uploads/2020/09/trong-gung-chua-nhieu-tinh-dau.jpg',
                'id_danh_muc'  => 20,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Gừng tươi, cay ấm. Dùng làm gia vị, nấu nước uống hoặc ngâm mật ong.'
            ],
        ];
        // Danh sách quả
        $qua = [
            [
                'ten_san_pham' => 'Táo Mỹ',
                'gia'          => 80000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://delifruit.vn/wp-content/uploads/2023/06/tao-my-1.jpg',
                'id_danh_muc'  => 21,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Táo Mỹ đỏ giòn ngọt, nhiều vitamin C. Ăn trực tiếp hoặc ép nước.'
            ],
            [
                'ten_san_pham' => 'Chuối',
                'gia'          => 22000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2021/10/14/chuoi1-16341869574602070184903.jpg',
                'id_danh_muc'  => 21,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Chuối chín vàng thơm ngọt, giàu kali. Phù hợp ăn trực tiếp, làm sinh tố hoặc bánh.'
            ],
            [
                'ten_san_pham' => 'Cam Sành',
                'gia'          => 45000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://foody24h.vn/uploads/collections/cam-sanh-4192-2021-08-26.jpg',
                'id_danh_muc'  => 21,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cam sành mọng nước, vị ngọt thanh. Ăn trực tiếp hoặc vắt nước giải khát.'
            ],
            [
                'ten_san_pham' => 'Dưa Hấu',
                'gia'          => 20000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://cdnphoto.dantri.com.vn/oL0vCNq3jl-uyK-XV-1wNyvhs9k=/thumb_w/1020/2020/12/19/duahau-1608348653200.jpg',
                'id_danh_muc'  => 21,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Dưa hấu đỏ ngọt mát, giải nhiệt. Ăn tươi, ép nước hoặc làm sinh tố.'
            ],
            [
                'ten_san_pham' => 'Xoài Cát',
                'gia'          => 50000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://quangon.vn/resources/2020/11/11/xoai-cat-chu-dong-thap-qua-ngon-5.jpg',
                'id_danh_muc'  => 21,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Xoài cát chín vàng, ngọt đậm. Ăn trực tiếp hoặc xay sinh tố.'
            ],
            [
                'ten_san_pham' => 'Lê Hàn Quốc',
                'gia'          => 90000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://360fruit.vn/uploads/file/360%20fruit%20bai%20viet/le-han-quoc-1.jpg',
                'id_danh_muc'  => 21,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Lê Hàn Quốc giòn ngọt, mọng nước. Ăn trực tiếp hoặc làm salad.'
            ],
            [
                'ten_san_pham' => 'Nho Đen',
                'gia'          => 120000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://traicaytonyteo.com/uploads/source/anh-web-ngoc/nho-den-khong-hat-my.jpg',
                'id_danh_muc'  => 21,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nho đen ngọt đậm, giàu chất chống oxy hóa. Ăn trực tiếp hoặc ép nước.'
            ],
            [
                'ten_san_pham' => 'Thanh Long',
                'gia'          => 35000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://media.vov.vn/sites/default/files/styles/large/public/2023-07/loi_ich_cua_qua_thanh_long.jpeg',
                'id_danh_muc'  => 21,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Thanh long ruột trắng/đỏ, ngọt mát. Ăn trực tiếp hoặc làm sinh tố.'
            ],
        ];
        // Danh sách trứng
        $trung = [
            [
                'ten_san_pham' => 'Trứng Gà Ta',
                'gia'          => 35000,
                'don_vi'       => '10 quả',
                'hinh_anh'     => 'https://tse1.mm.bing.net/th/id/OIP.haF7fkPFe-Q2zmxX9swHgAHaFM?pid=Api&P=0&h=180',
                'id_danh_muc'  => 22,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trứng gà ta vỏ nâu, lòng đỏ đậm. Thích hợp chiên, luộc hoặc làm bánh.'
            ],
            [
                'ten_san_pham' => 'Trứng Vịt Lộn',
                'gia'          => 25000,
                'don_vi'       => '4 quả',
                'hinh_anh'     => 'https://cdn.dealtoday.vn/chon-mua-trung-vit-lon_07112023091035.jpg',
                'id_danh_muc'  => 22,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trứng vịt lộn béo bùi, giàu dinh dưỡng. Ăn kèm rau răm và muối tiêu chanh.'
            ],
            [
                'ten_san_pham' => 'Trứng Cút',
                'gia'          => 18000,
                'don_vi'       => '20 quả',
                'hinh_anh'     => 'https://nuocmamthinhphat.com/wp-content/uploads/2021/12/trung-cut-chien-nuoc-mam.jpg',
                'id_danh_muc'  => 22,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trứng cút nhỏ, giàu vitamin B. Thích hợp luộc, chiên hoặc kho.'
            ],
            [
                'ten_san_pham' => 'Trứng Vịt',
                'gia'          => 40000,
                'don_vi'       => '10 quả',
                'hinh_anh'     => 'https://sohanews.sohacdn.com/thumb_w/1000/160588918557773824/2023/5/25/photo-2-1684985611250809258948.png',
                'id_danh_muc'  => 22,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trứng vịt vỏ dày, lòng đỏ to. Thích hợp muối hoặc luộc ăn trực tiếp.'
            ],
            [
                'ten_san_pham' => 'Trứng Ngỗng',
                'gia'          => 60000,
                'don_vi'       => '2 quả',
                'hinh_anh'     => 'https://tse3.mm.bing.net/th/id/OIP.D67gM9sJDU4BnRBA_TRJ0gHaE7?pid=Api&P=0&h=180',
                'id_danh_muc'  => 22,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trứng ngỗng kích thước lớn, giàu protein. Thường dùng luộc hoặc làm bánh.'
            ],
        ];
        // Danh sách sữa
        $sua = [
            [
                'ten_san_pham' => 'Sữa Tươi Vinamilk',
                'gia'          => 29000,
                'don_vi'       => 'hộp 1L',
                'hinh_anh'     => 'https://data-service.pharmacity.io/pmc-upload-media/production/pmc-ecm-core/products/P05047_2.jpg',
                'id_danh_muc'  => 23,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Sữa tươi tiệt trùng Vinamilk, vị béo nhẹ. Uống trực tiếp hoặc pha chế món ăn.'
            ],
            [
                'ten_san_pham' => 'Sữa TH True Milk',
                'gia'          => 32000,
                'don_vi'       => 'hộp 1L',
                'hinh_anh'     => 'https://suachobeyeu.vn/upload/images/sua-tuoi-th-true-milk-nguyen-chat-hop-180ml-1.jpg',
                'id_danh_muc'  => 23,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Sữa tươi TH True Milk nguyên chất, hương vị thơm béo tự nhiên.'
            ],
            [
                'ten_san_pham' => 'Sữa Cô Gái Hà Lan',
                'gia'          => 31000,
                'don_vi'       => 'hộp 1L',
                'hinh_anh'     => 'https://www.u-shop.vn/images/thumbs/0011305_thung-sua-tuoi-tiet-trung-co-gai-ha-lan-co-duong-180ml.png',
                'id_danh_muc'  => 23,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Sữa tươi Cô Gái Hà Lan thơm ngọt, giàu canxi. Dùng uống trực tiếp hoặc pha café.'
            ],
            [
                'ten_san_pham' => 'Sữa Ông Thọ',
                'gia'          => 22000,
                'don_vi'       => 'lon 380g',
                'hinh_anh'     => 'https://cdn.tgdd.vn/Products/Images/2526/77412/bhx/sua-dac-co-duong-ong-tho-do-lon-380g-201911071548119343.jpg',
                'id_danh_muc'  => 23,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Sữa đặc Ông Thọ, vị ngọt béo. Dùng pha café, làm bánh hoặc chế biến món ăn.'
            ],
        ];
        // Danh sách gạo
        $gao = [
            [
                'ten_san_pham' => 'Gạo ST25',
                'gia'          => 25000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://vn-test-11.slatic.net/p/ba3694487c0f71e6138905a54a052cf0.png',
                'id_danh_muc'  => 1,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Gạo ST25 dẻo thơm, hạt dài, đạt giải gạo ngon nhất thế giới. Thích hợp nấu cơm gia đình.'
            ],
            [
                'ten_san_pham' => 'Gạo Lài',
                'gia'          => 22000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://gaolacviet.com.vn/wp-content/uploads/2021/11/25KG-MOCKUP_THOM-LAI-scaled.jpg',
                'id_danh_muc'  => 1,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Gạo Lài hạt trắng trong, cơm mềm thơm nhẹ. Thích hợp nấu cơm hàng ngày.'
            ],
            [
                'ten_san_pham' => 'Gạo Tám',
                'gia'          => 28000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'http://www.gaothaiduong.com/Portals/27044/San%20pham/Gao%20Thong%20dung%20TD/Gao%20Tam%20Xuan%20Dai%202kg.jpg',
                'id_danh_muc'  => 1,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Gạo Tám thơm dẻo, vị ngọt tự nhiên. Dùng nấu cơm hoặc xôi.'
            ],
            [
                'ten_san_pham' => 'Gạo Nhật',
                'gia'          => 35000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://havicofood.com.vn/wp-content/uploads/2024/05/gaonhat_mt.jpg',
                'id_danh_muc'  => 1,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Gạo Nhật hạt tròn, dẻo dính, chuyên dùng cho sushi và cơm nắm.'
            ],
        ];
        // Danh sách ngũ cốc
        $ngu_coc = [
            [
                'ten_san_pham' => 'Ngũ cốc Nestlé',
                'gia'          => 45000,
                'don_vi'       => 'hộp',
                'hinh_anh'     => 'https://filebroker-cdn.lazada.vn/kf/S656156bbcdbb45c7abf58e6b4b68622dQ.jpg',
                'id_danh_muc'  => 2,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Ngũ cốc Nestlé giòn ngon, giàu vitamin và khoáng chất. Ăn sáng cùng sữa tươi.'
            ],
            [
                'ten_san_pham' => 'Yến mạch Quaker',
                'gia'          => 50000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://tse3.mm.bing.net/th/id/OIP.5EPfftskHIQVEPW-LtDAoQHaHa?pid=Api&P=0&h=180',
                'id_danh_muc'  => 2,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Yến mạch Quaker nguyên hạt, giàu chất xơ. Dùng nấu cháo hoặc làm granola.'
            ],
            [
                'ten_san_pham' => 'Granola',
                'gia'          => 70000,
                'don_vi'       => 'túi',
                'hinh_anh'     => 'https://images.kglobalservices.com/www.kelloggs.ae_en/en_ae/product/product_2137713/prod_img-2146203_en_ae_08682530220305_2212291204_p_1.png',
                'id_danh_muc'  => 2,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Granola giòn ngọt, kết hợp yến mạch và trái cây sấy. Ăn liền hoặc kèm sữa chua.'
            ],
            [
                'ten_san_pham' => 'Ngũ cốc Koko Krunch',
                'gia'          => 48000,
                'don_vi'       => 'hộp',
                'hinh_anh'     => 'https://www.pantryexpress.my/148-large_default/nestle-koko-krunch-cereal-300g.jpg',
                'id_danh_muc'  => 2,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Ngũ cốc Koko Krunch vị socola hấp dẫn, giòn tan. Dùng cho bữa sáng nhanh gọn.'
            ],
        ];
        // Danh sách hạt
        $hat = [
            [
                'ten_san_pham' => 'Hạt Hạnh Nhân',
                'gia'          => 150000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://vinafood.vn/wp-content/uploads/2020/07/hat-hanh-nhan.jpg',
                'id_danh_muc'  => 16,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Hạt hạnh nhân giàu vitamin E và chất béo tốt. Dùng ăn liền hoặc làm bánh.'
            ],
            [
                'ten_san_pham' => 'Hạt Óc Chó',
                'gia'          => 200000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://bazanland.com/wp-content/uploads/2020/02/hat-oc-cho-nguyen-vo-300g-bazanland.jpg',
                'id_danh_muc'  => 16,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Hạt óc chó chứa omega-3 tốt cho tim mạch. Ăn trực tiếp hoặc trộn salad.'
            ],
            [
                'ten_san_pham' => 'Hạt Điều',
                'gia'          => 180000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'http://www.hatdieuta.com/images/hat-dieu-rang-muoi-vo-lua-xuat-khau-e1468430405273.jpg',
                'id_danh_muc'  => 16,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Hạt điều rang muối thơm béo. Dùng ăn vặt hoặc chế biến món ăn.'
            ],
            [
                'ten_san_pham' => 'Hạt Dẻ Cười',
                'gia'          => 250000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://product.hstatic.net/200000261315/product/hat_de_cuoi__3__904bf25c86f642fba976f5afdf4fd009_master.jpg',
                'id_danh_muc'  => 16,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Hạt dẻ cười giòn bùi, giàu chất chống oxy hóa. Ăn liền hoặc dùng làm topping.'
            ],
        ];
        // Danh sách đồ hộp
        $do_hop = [
            [
                'ten_san_pham' => 'Cá hộp',
                'gia'          => 25000,
                'don_vi'       => 'hộp',
                'hinh_anh'     => 'https://toplist.vn/images/800px/ca-hop-three-lady-cooks-255633.jpg',
                'id_danh_muc'  => 8,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cá hộp tiện lợi, giàu protein. Dùng ăn liền hoặc chế biến món mặn nhanh.'
            ],
            [
                'ten_san_pham' => 'Thịt hộp',
                'gia'          => 35000,
                'don_vi'       => 'hộp',
                'hinh_anh'     => 'https://khothegioi.com/image/cache/catalog/Products-KTG2/TP149/thit-hop-han-quoc-lotte-the-luncheon-meat-ok-340g-01-500x500.jpg',
                'id_danh_muc'  => 8,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Thịt hộp hầm mềm, đậm đà gia vị. Thích hợp ăn với cơm hoặc mì.'
            ],
            [
                'ten_san_pham' => 'Đậu hộp',
                'gia'          => 20000,
                'don_vi'       => 'hộp',
                'hinh_anh'     => 'https://admin.strawberrycstore.com/storage/2020/12/bsHgtGOD1mkRkt2Fe3Q5TIPnXxAXGTkCgVy7cAUY.jpeg',
                'id_danh_muc'  => 8,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Đậu hộp mềm bùi, giàu dinh dưỡng. Dùng nấu súp hoặc salad.'
            ],
            [
                'ten_san_pham' => 'Ngô hộp',
                'gia'          => 18000,
                'don_vi'       => 'hộp',
                'hinh_anh'     => 'https://product.hstatic.net/200000325223/product/z5703370300139_c638918ebad9a442e1eecec12484a344_a1bf647fa47a4c6fb82a2c061c28e74a_master.jpg',
                'id_danh_muc'  => 8,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Ngô hộp ngọt tự nhiên, dùng nấu súp, xào hoặc làm topping salad.'
            ],
        ];
        // Danh sách xúc xích
        $xuc_xich = [
            [
                'ten_san_pham' => 'Xúc xích Đức',
                'gia'          => 45000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://vnn-imgs-f.vgcloud.vn/2021/06/11/09/xuc-xich-duc-viet-mon-ngon-nham-nhi-xem-bong-da.jpg',
                'id_danh_muc'  => 9,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Xúc xích Đức vị khói đặc trưng, thích hợp nướng hoặc áp chảo.'
            ],
            [
                'ten_san_pham' => 'Xúc xích tiệt trùng',
                'gia'          => 30000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://thucphamsachgiatot.vn/image/cache/catalog/XX-TT-HEO-5X35G-700x700.jpg',
                'id_danh_muc'  => 9,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Xúc xích tiệt trùng tiện lợi, ăn liền hoặc chế biến món nhanh.'
            ],
            [
                'ten_san_pham' => 'Xúc xích phô mai',
                'gia'          => 50000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://fujimart.vn/wp-content/uploads/2024/01/Xuc-xich-pho-mai-Cheesy-250g.png',
                'id_danh_muc'  => 9,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Xúc xích phô mai béo ngậy, thơm ngon cho bữa ăn nhẹ.'
            ],
            [
                'ten_san_pham' => 'Xúc xích bò',
                'gia'          => 60000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://product.hstatic.net/1000288770/product/iet_trung_vissan_4_cay_x_40g_goi_160g_ac7bb6cd11bb4888b791376500c58aaf_f2d3141d300f4c4fb83bc9baa365a369_master.jpg',
                'id_danh_muc'  => 9,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Xúc xích bò đậm vị, giàu đạm, phù hợp nướng hoặc chiên.'
            ],
        ];
        // Danh sách gia vị
        $gia_vi = [
            [
                'ten_san_pham' => 'Muối hạt',
                'gia'          => 10000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://minhcaumart.vn/media/com_eshop/products/8934781130071.webp',
                'id_danh_muc'  => 6,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Muối hạt tinh khiết, dùng nêm nấu hoặc muối chua.'
            ],
            [
                'ten_san_pham' => 'Bột ngọt',
                'gia'          => 15000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://product.hstatic.net/200000401369/product/bot_ngot_b1b6016a207f43749149b571761cbe24_36ebd922045d4f2cb9c8899734d2da6f_1024x1024.jpg',
                'id_danh_muc'  => 6,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bột ngọt tăng vị ngọt tự nhiên cho món ăn.'
            ],
            [
                'ten_san_pham' => 'Tiêu xay',
                'gia'          => 20000,
                'don_vi'       => 'lọ',
                'hinh_anh'     => 'http://img.websosanh.vn/v2/users/root_product/images/tieu-den-xay-dh-foods-hu-80g/17u2137x9ftap.jpg',
                'id_danh_muc'  => 6,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Tiêu xay thơm cay, dùng ướp thịt hoặc rắc lên món ăn.'
            ],
            [
                'ten_san_pham' => 'Đường trắng',
                'gia'          => 12000,
                'don_vi'       => 'kg',
                'hinh_anh'     => 'https://phucuongfood.com.vn/wp-content/uploads/2021/09/duong-trang.jpg',
                'id_danh_muc'  => 6,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Đường trắng tinh luyện, dùng pha chế và nấu ăn.'
            ],
        ];
        // Danh sách nước chấm
        $nuoc_cham = [
            [
                'ten_san_pham' => 'Nước mắm',
                'gia'          => 35000,
                'don_vi'       => 'chai',
                'hinh_anh'     => 'https://down-vn.img.susercontent.com/file/a75b21213413ae0a9c29fad15183011c',
                'id_danh_muc'  => 7,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước mắm truyền thống đậm đà, thích hợp pha chấm và nấu ăn.'
            ],
            [
                'ten_san_pham' => 'Nước tương',
                'gia'          => 28000,
                'don_vi'       => 'chai',
                'hinh_anh'     => 'https://nhanhoavegie.com.vn/wp-content/uploads/2022/02/Nuoc-tuong-Tam-Thai-Tu.jpg',
                'id_danh_muc'  => 7,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước tương thơm nhẹ, dùng chấm hoặc xào nấu.'
            ],
            [
                'ten_san_pham' => 'Tương ớt',
                'gia'          => 22000,
                'don_vi'       => 'chai',
                'hinh_anh'     => 'https://cdn.tgdd.vn/Products/Images/2567/76916/bhx/tuong-ot-chinsu-250g-24-2-org.jpg',
                'id_danh_muc'  => 7,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Tương ớt cay nồng, thích hợp làm nước chấm và nêm gia vị.'
            ],
            [
                'ten_san_pham' => 'Tương đen',
                'gia'          => 26000,
                'don_vi'       => 'chai',
                'hinh_anh'     => 'https://cholimexfood.com.vn/wp-content/uploads/2019/12/tuong-den-230g-FILEminimizer.jpg',
                'id_danh_muc'  => 7,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Tương đen ngọt nhẹ, thường dùng chấm bánh cuốn hoặc phở.'
            ],
        ];
        // Mì
        $mi = [
            [
                'ten_san_pham' => 'Mì Hảo Hảo',
                'gia'          => 3500,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://images2.thanhnien.vn/Uploaded/ngocthanh/2015_02_10/haohao_14_CYSP.jpg?width=500',
                'id_danh_muc'  => 3,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Mì ăn liền hương vị đậm đà, tiện lợi cho mọi bữa ăn nhanh.'
            ],
            [
                'ten_san_pham' => 'Mì 3 Miền',
                'gia'          => 4000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://cdn.tgdd.vn/Products/Images/2565/96215/bhx/mi-3-mien-gold-tom-chua-cay-dac-biet-goi-75g-202004171750052898.jpg',
                'id_danh_muc'  => 3,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Mì 3 Miền thơm ngon, sợi mì dai, hương vị truyền thống.'
            ],
            [
                'ten_san_pham' => 'Mì Omachi',
                'gia'          => 6000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://product.hstatic.net/200000786543/product/omachi-tron-spagetti-105g-700x700_063372717c15468ea034816cfb29d914_grande.jpg',
                'id_danh_muc'  => 3,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Mì Omachi với sợi mì khoai tây dai ngon, vị nước dùng đậm đà.'
            ],
            [
                'ten_san_pham' => 'Mì Koreno',
                'gia'          => 7000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://product.hstatic.net/200000245115/product/tai_xuong__1__599744e27845468ca11dbe424df3c62a_1024x1024.jpg',
                'id_danh_muc'  => 3,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Mì Koreno vị Hàn Quốc cay nồng, sợi mì to và dai.'
            ],
        ];
        // Bún
        $bun = [
            [
                'ten_san_pham' => 'Bún khô sợi nhỏ',
                'gia'          => 20000,
                'don_vi'       => 'bịch',
                'hinh_anh'     => 'https://tse2.mm.bing.net/th/id/OIP.RLcxRDXoGeih0nSTFqm0pQHaHa?pid=Api&P=0&h=180',
                'id_danh_muc'  => 4,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bún khô sợi nhỏ, dễ nấu, thích hợp cho nhiều món nước và xào.'
            ],
            [
                'ten_san_pham' => 'Bún khô sợi to',
                'gia'          => 22000,
                'don_vi'       => 'bịch',
                'hinh_anh'     => 'https://www.lottemart.vn/media/catalog/product/cache/0x0/8/9/8934746056804-1.jpg.webp',
                'id_danh_muc'  => 4,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bún khô sợi to, dùng nấu bún bò, bún riêu hoặc bún xào.'
            ],
            [
                'ten_san_pham' => 'Bún gạo lứt',
                'gia'          => 25000,
                'don_vi'       => 'bịch',
                'hinh_anh'     => 'https://product.hstatic.net/1000141988/product/bun_gao_lut_tim__bun_an_bddd3b4f02824ea887ee8fac0e056960_1024x1024.jpg',
                'id_danh_muc'  => 4,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bún gạo lứt bổ dưỡng, ít tinh bột, phù hợp ăn kiêng.'
            ],
            [
                'ten_san_pham' => 'Bún tươi đóng gói',
                'gia'          => 18000,
                'don_vi'       => 'bịch',
                'hinh_anh'     => 'https://cdn.tgdd.vn/Products/Images/8163/249870/bhx/bun-tuoi-goi-500g-202406101321522756.jpg',
                'id_danh_muc'  => 4,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bún tươi đóng gói tiện lợi, chỉ cần trụng nước sôi là dùng được.'
            ],
        ];
        // Phở khô
        $pho_kho = [
            [
                'ten_san_pham' => 'Phở khô Vifon',
                'gia'          => 28000,
                'don_vi'       => 'bịch',
                'hinh_anh'     => 'https://sg-live-01.slatic.net/p/3e13d2e1fe5212018a5dd38a32ccfa65.jpg_525x525q80.jpg',
                'id_danh_muc'  => 5,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Phở khô Vifon truyền thống, sợi mềm dai, nấu nhanh chóng.'
            ],
            [
                'ten_san_pham' => 'Phở khô Bích Chi',
                'gia'          => 30000,
                'don_vi'       => 'bịch',
                'hinh_anh'     => 'https://www.veganic.vn/public/upload/menu/1-6.jpg',
                'id_danh_muc'  => 5,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Phở khô Bích Chi thơm ngon, sợi phở trắng đẹp và dẻo.'
            ],
            [
                'ten_san_pham' => 'Phở khô Safoco',
                'gia'          => 32000,
                'don_vi'       => 'bịch',
                'hinh_anh'     => 'https://product.hstatic.net/1000288770/product/b_n_kh__safoco_g_i_400g.jpg',
                'id_danh_muc'  => 5,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Phở khô Safoco chất lượng cao, giữ hương vị phở Bắc.'
            ],
            [
                'ten_san_pham' => 'Phở khô Mikochi',
                'gia'          => 27000,
                'don_vi'       => 'bịch',
                'hinh_anh'     => 'https://gcs.tripi.vn/public-tripi/tripi-feed/img/476000IOa/anh-mo-ta.png',
                'id_danh_muc'  => 5,

                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Phở khô Mikochi hương vị đậm đà, sợi phở dai và mềm.'
            ],
        ];
        // Bia – Rượu
        $bia_ruou = [
            [
                'ten_san_pham' => 'Bia Heineken',
                'gia'          => 20000,
                'don_vi'       => 'lon 330ml',
                'hinh_anh'     => 'https://meta.vn/Data/image/2016/05/19/bia-heineken-330-ml-24-lon.jpg',
                'id_danh_muc'  => 25,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bia Heineken hương vị đậm đà, mát lạnh cho những buổi tiệc vui.'
            ],
            [
                'ten_san_pham' => 'Bia Tiger',
                'gia'          => 18000,
                'don_vi'       => 'lon 330ml',
                'hinh_anh'     => 'https://quancathaibinh.vn/uploads/products/2222.png',
                'id_danh_muc'  => 25,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bia Tiger vị êm nhẹ, thích hợp thưởng thức cùng món nướng.'
            ],
            [
                'ten_san_pham' => 'Bia Sài Gòn Đỏ',
                'gia'          => 13000,
                'don_vi'       => 'chai 450ml',
                'hinh_anh'     => 'https://www.sabeco.com.vn/bia-saigon/assets/images/detail/export__suggest.png',
                'id_danh_muc'  => 25,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bia Sài Gòn Đỏ truyền thống, vị đậm đà quen thuộc.'
            ],
            [
                'ten_san_pham' => 'Bia Larue',
                'gia'          => 12000,
                'don_vi'       => 'chai 355ml',
                'hinh_anh'     => 'https://baothymart.com/wp-content/uploads/2023/11/Bia-Larue-Smooth-330ml.jpg',
                'id_danh_muc'  => 25,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bia Larue vị mát dịu, hương thơm nhẹ, dễ uống.'
            ],
            [
                'ten_san_pham' => 'Rượu Vodka Hà Nội',
                'gia'          => 65000,
                'don_vi'       => 'chai 500ml',
                'hinh_anh'     => 'https://www.phanphoiruoungoai.net/wp-content/uploads/2018/03/ruou-vodka-hanoi-300-ml.jpg',
                'id_danh_muc'  => 25,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rượu Vodka Hà Nội truyền thống, hương vị mạnh mẽ.'
            ],
            [
                'ten_san_pham' => 'Rượu Chivas Regal 12',
                'gia'          => 850000,
                'don_vi'       => 'chai 750ml',
                'hinh_anh'     => 'https://www.diariohispaniola.com/fotos/1/105957_chivasregal.jpg',
                'id_danh_muc'  => 25,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rượu Chivas Regal 12 cao cấp, hương vị êm dịu, sang trọng.'
            ],
            [
                'ten_san_pham' => 'Rượu Johnnie Walker Black',
                'gia'          => 950000,
                'don_vi'       => 'chai 700ml',
                'hinh_anh'     => 'https://sanhruou.com/media/image/791/ruou-johnnie-walker-black-label-1l.jpg',
                'id_danh_muc'  => 25,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rượu Johnnie Walker Black hương vị đậm đà, phong cách quý phái.'
            ],
            [
                'ten_san_pham' => 'Rượu Vang Đà Lạt',
                'gia'          => 150000,
                'don_vi'       => 'chai 750ml',
                'hinh_anh'     => 'https://ruouvang24h.vn/wp-content/uploads/2019/10/R%C6%B0%E1%BB%A3u-Vang-%C4%90%C3%A0-L%E1%BA%A1t-Dankia-Red-Wine-1.jpg',
                'id_danh_muc'  => 25,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Rượu Vang Đà Lạt ngọt dịu, hương vị trái cây đặc trưng.'
            ],
        ];
        // Cà phê – Trà
        $cafe_tra = [
            [
                'ten_san_pham' => 'Cafe G7 Hòa Tan',
                'gia'          => 55000,
                'don_vi'       => 'hộp 20 gói',
                'hinh_anh'     => 'https://huyenthoaiviet.vn/file/G7-Instant-Black-Coffee-no-sugar-317f.jpg',
                'id_danh_muc'  => 26,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cafe G7 hòa tan thơm đậm, tiện lợi cho mọi lúc.'
            ],
            [
                'ten_san_pham' => 'Cafe Trung Nguyên Legend',
                'gia'          => 98000,
                'don_vi'       => 'hộp 10 gói',
                'hinh_anh'     => 'https://salt.tikicdn.com/ts/product/02/cc/bc/83dbe032e19eb5767e637833cf61ed36.jpg',
                'id_danh_muc'  => 26,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cafe Trung Nguyên Legend cao cấp, hương vị mạnh mẽ.'
            ],
            [
                'ten_san_pham' => 'Cafe Nescafe 3in1',
                'gia'          => 65000,
                'don_vi'       => 'hộp 25 gói',
                'hinh_anh'     => 'https://www.nescafe.com/sites/default/files/2023-04/4019P_HeroGallery_3in1_1_960x960.png',
                'id_danh_muc'  => 26,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cafe Nescafe 3in1 hòa tan nhanh, vị đậm và thơm.'
            ],
            [
                'ten_san_pham' => 'Cafe Highlands',
                'gia'          => 75000,
                'don_vi'       => 'hộp 15 gói',
                'hinh_anh'     => 'https://cf.shopee.vn/file/4380cfc307a6b20a3e17fb2ce8ccf8f4',
                'id_danh_muc'  => 26,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cafe Highlands hương vị đậm chất Việt, thơm ngon đặc biệt.'
            ],
            [
                'ten_san_pham' => 'Trà Lipton Vàng',
                'gia'          => 48000,
                'don_vi'       => 'hộp 25 gói',
                'hinh_anh'     => 'https://drive.gianhangvn.com/image/lipton-yellow-label-tea-232560j12208.jpg',
                'id_danh_muc'  => 26,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trà Lipton Vàng thanh mát, dễ uống, hương thơm dịu nhẹ.'
            ],
            [
                'ten_san_pham' => 'Trà Ô Long Cozy',
                'gia'          => 52000,
                'don_vi'       => 'hộp 20 gói',
                'hinh_anh'     => 'https://www.lottemart.vn/media/catalog/product/cache/0x0/8/9/8936010530409-1.jpg.webp',
                'id_danh_muc'  => 26,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trà Ô Long Cozy thơm ngon, vị chát nhẹ đặc trưng.'
            ],
            [
                'ten_san_pham' => 'Trà Atiso Đà Lạt',
                'gia'          => 60000,
                'don_vi'       => 'hộp 20 gói',
                'hinh_anh'     => 'https://nongsandalat.vn/wp-content/uploads/2022/01/tra-atiso-tui-loc-40-tui-scaled.jpg',
                'id_danh_muc'  => 26,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trà Atiso Đà Lạt thanh mát, hỗ trợ giải nhiệt cơ thể.'
            ],
            [
                'ten_san_pham' => 'Trà Gừng Hòa Tan',
                'gia'          => 40000,
                'don_vi'       => 'hộp 15 gói',
                'hinh_anh'     => 'https://cf.shopee.vn/file/5fea35db0fdb251959b6ba61dc6b21ef',
                'id_danh_muc'  => 26,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trà gừng hòa tan ấm nóng, tốt cho sức khỏe và tiêu hóa.'
            ],
        ];
        // nuoc
        $nuoc = [
            [
                'ten_san_pham' => 'Nước Suối Lavie',
                'gia'          => 6000,
                'don_vi'       => 'chai 500ml',
                'hinh_anh'     => 'https://gaonuochoanggia.com/wp-content/uploads/2019/05/thanh-phan-lavie.png',
                'id_danh_muc'  => 24,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước suối tinh khiết, giải khát nhanh chóng.'
            ],
            [
                'ten_san_pham' => 'Coca-Cola',
                'gia'          => 12000,
                'don_vi'       => 'lon 330ml',
                'hinh_anh'     => 'https://as1.ftcdn.net/v2/jpg/02/94/77/04/1000_F_294770424_28McL2coTqDN3kxWDNDLmCHTyl3e1UBu.jpg',
                'id_danh_muc'  => 24,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước ngọt có gas hương cola sảng khoái.'
            ],
            [
                'ten_san_pham' => 'Pepsi',
                'gia'          => 12000,
                'don_vi'       => 'lon 330ml',
                'hinh_anh'     => 'https://smartlabel.pepsico.info/012000000133-0004-en-US/images/4c7e3191-7af2-4f38-85c9-71809e427203.jpg',
                'id_danh_muc'  => 24,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước ngọt Pepsi đậm đà, tươi mát.'
            ],
            [
                'ten_san_pham' => 'Trà Xanh Không Độ',
                'gia'          => 10000,
                'don_vi'       => 'chai 455ml',
                'hinh_anh'     => 'https://d1v5l30g8wuyvb.cloudfront.net/thp.com.vn/uploads/2023/11/08101007/TXKD-PET-350x540-1.png',
                'id_danh_muc'  => 24,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Trà xanh thanh mát, tốt cho sức khỏe.'
            ],
            [
                'ten_san_pham' => 'Sting Dâu',
                'gia'          => 11000,
                'don_vi'       => 'chai 330ml',
                'hinh_anh'     => 'https://minhcaumart.vn/media/com_eshop/products/8934588233074.jpg',
                'id_danh_muc'  => 24,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước tăng lực vị dâu ngọt dịu, giàu năng lượng.'
            ],
            [
                'ten_san_pham' => '7Up',
                'gia'          => 12000,
                'don_vi'       => 'lon 330ml',
                'hinh_anh'     => 'https://www.7up.com/images/simple-7up/storeLocator.jpg',
                'id_danh_muc'  => 24,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước ngọt chanh 7Up mát lạnh, không caffeine.'
            ],
            [
                'ten_san_pham' => 'Nước Cam Twister',
                'gia'          => 18000,
                'don_vi'       => 'chai 1L',
                'hinh_anh'     => 'https://cdn.fast.vn/tmp/20200919120131-6-chai-nuoc-cam-ep-twister-tropicana-455ml-2.JPG',
                'id_danh_muc'  => 24,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước cam ép tự nhiên, giàu vitamin C.'
            ],
            [
                'ten_san_pham' => 'Revive',
                'gia'          => 15000,
                'don_vi'       => 'chai 500ml',
                'hinh_anh'     => 'https://www.lottemart.vn/media/catalog/product/cache/0x0/8/9/8934588843051.jpg.webp',
                'id_danh_muc'  => 24,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Nước bù khoáng Revive, phục hồi năng lượng nhanh.'
            ],
        ];
        // banh ngot
        $banhNgot = [
            [
                'ten_san_pham' => 'Bánh Kem Dâu',
                'gia'          => 120000,
                'don_vi'       => 'cái',
                'hinh_anh'     => 'http://www.bahungbakery.com.vn/upload/images/160211390_3826680327445281_4068177669985540255_n_3826680324111948-e1667021066209.jpg',
                'id_danh_muc'  => 10,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bánh kem vị dâu tươi thơm ngon, mềm mịn.'
            ],
            [
                'ten_san_pham' => 'Bánh Cupcake',
                'gia'          => 35000,
                'don_vi'       => 'cái',
                'hinh_anh'     => 'https://truongphat247.vn/wp-content/uploads/2019/05/banh-sinh-nhat-cupcake-hoa-45b59959d0b306.jpg',
                'id_danh_muc'  => 10,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Cupcake nhỏ gọn, phủ kem béo ngậy.'
            ],
            [
                'ten_san_pham' => 'Bánh Flan',
                'gia'          => 20000,
                'don_vi'       => 'hũ',
                'hinh_anh'     => 'https://file.hstatic.net/200000333181/article/creamy-caramel-flan_exps_ft20_2197_f_0723_1_e3fbb025c7d24960bc978a73ec76c5dc.jpg',
                'id_danh_muc'  => 10,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bánh flan trứng sữa mềm mịn, thơm lừng.'
            ],
            [
                'ten_san_pham' => 'Bánh Su Kem',
                'gia'          => 25000,
                'don_vi'       => 'cái',
                'hinh_anh'     => 'https://i.ytimg.com/vi/PD9yPFf0HpE/maxresdefault.jpg',
                'id_danh_muc'  => 10,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Su kem vỏ giòn, nhân kem sữa béo ngậy.'
            ],
        ];
        // Bánh mì
        $banhMi = [
            [
                'ten_san_pham' => 'Bánh Mì Thịt',
                'gia'          => 25000,
                'don_vi'       => 'ổ',
                'hinh_anh'     => 'https://cdn.tgdd.vn/Files/2021/08/20/1376583/cach-lam-banh-mi-thit-nuong-cuc-don-gian-bang-chai-nhua-co-san-tai-nha-202108201640593483.jpg',
                'id_danh_muc'  => 11,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bánh mì thịt tươi ngon, đầy đủ rau và nước sốt.'
            ],
            [
                'ten_san_pham' => 'Bánh Mì Gà Xé',
                'gia'          => 28000,
                'don_vi'       => 'ổ',
                'hinh_anh'     => 'https://cdn.tgdd.vn/Files/2021/07/24/1370471/2-mon-banh-mi-ga-xe-de-lam-thom-ngon-du-chat-cho-buoi-sang-day-nang-luong-202107241438454808.jpg',
                'id_danh_muc'  => 11,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bánh mì gà xé thơm lừng, vị đậm đà.'
            ],
            [
                'ten_san_pham' => 'Bánh Mì Trứng',
                'gia'          => 20000,
                'don_vi'       => 'ổ',
                'hinh_anh'     => 'https://img-global.cpcdn.com/recipes/01914f4be6cc4786/1200x630cq70/photo.jpg',
                'id_danh_muc'  => 11,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bánh mì trứng ốp la béo ngậy, thích hợp bữa sáng.'
            ],
            [
                'ten_san_pham' => 'Bánh Mì Chả Cá',
                'gia'          => 22000,
                'don_vi'       => 'ổ',
                'hinh_anh'     => 'https://tubideli.com/wp-content/uploads/2023/01/banh-mi-cha-ca-040.jpg',
                'id_danh_muc'  => 11,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bánh mì chả cá giòn tan, hương vị biển hấp dẫn.'
            ],
        ];
        // Kẹo
        $keo = [
            [
                'ten_san_pham' => 'Kẹo Alpenliebe',
                'gia'          => 15000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://www.lottemart.vn/media/catalog/product/cache/0x0/8/9/8935001714163.jpg.webp',
                'id_danh_muc'  => 12,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Kẹo caramel mềm mịn, vị ngọt thanh.'
            ],
            [
                'ten_san_pham' => 'Kẹo Mút Chupa Chups',
                'gia'          => 25000,
                'don_vi'       => 'túi',
                'hinh_anh'     => 'https://cf.shopee.vn/file/da5135e1c56feed2bb872ad0ec9c4bc0',
                'id_danh_muc'  => 12,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Kẹo mút nhiều vị trái cây, ngọt ngào vui nhộn.'
            ],
            [
                'ten_san_pham' => 'Kẹo Dẻo Haribo',
                'gia'          => 30000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://victoryplaza.vn/media/product/5622_4001686301265___haribo_goldba_ren.jpg',
                'id_danh_muc'  => 12,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Kẹo dẻo trái cây dai ngon, đủ màu sắc.'
            ],
            [
                'ten_san_pham' => "Kẹo Socola M&M's",
                'gia'          => 35000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://down-vn.img.susercontent.com/file/vn-11134201-23020-xu1tha810wnv2e',
                'id_danh_muc'  => 12,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Kẹo socola M&M\'s phủ đường đầy màu sắc.'
            ],
        ];
        // Socola
        $socola = [
            [
                'ten_san_pham' => 'Socola Hershey',
                'gia'          => 50000,
                'don_vi'       => 'thanh',
                'hinh_anh'     => 'https://tse1.mm.bing.net/th/id/OIP.7IrXXO2m34mrQ6pR1-lT4gHaHI?pid=Api&P=0&h=1800',
                'id_danh_muc'  => 13,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Socola Hershey đậm đà, thơm béo.'
            ],
            [
                'ten_san_pham' => 'Socola Ferrero Rocher',
                'gia'          => 120000,
                'don_vi'       => 'hộp',
                'hinh_anh'     => 'https://www.theflowers.vn/wp-content/uploads/2017/12/Socola-Ferrero-Rocher-16-vien-2.png',
                'id_danh_muc'  => 13,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Socola Ferrero cao cấp, nhân hạt phỉ thơm ngon.'
            ],
            [
                'ten_san_pham' => 'Socola KitKat',
                'gia'          => 45000,
                'don_vi'       => 'thanh',
                'hinh_anh'     => 'https://emartmall.com.vn/image/cache/catalog/products/9556001027252/9556001027252-600x600.jpg',
                'id_danh_muc'  => 13,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Socola KitKat giòn tan, vị cacao hấp dẫn.'
            ],
            [
                'ten_san_pham' => 'Socola Toblerone',
                'gia'          => 90000,
                'don_vi'       => 'thanh',
                'hinh_anh'     => 'https://cf.shopee.sg/file/6c044d0550aee96007437fb76427fc9e',
                'id_danh_muc'  => 13,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Socola Toblerone nổi tiếng với miếng tam giác đặc trưng.'
            ],
        ];
        // Snack
        $snack = [
            [
                'ten_san_pham' => 'Snack Poca',
                'gia'          => 12000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://vn-test-11.slatic.net/original/4fb7dc89ec20e72411748da987561708.jpg',
                'id_danh_muc'  => 14,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Snack Poca khoai tây giòn rụm, vị truyền thống.'
            ],
            [
                'ten_san_pham' => 'Snack Khoai Tây',
                'gia'          => 15000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://product.hstatic.net/1000301274/product/_10100968__snack_khoai_tay_vi_bo_mat_ong_funmore_130g_t24__1__f693df7864bd4a50bc8fe9c3c38d73af_1024x1024.png',
                'id_danh_muc'  => 14,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Snack khoai tây vị muối biển, giòn tan hấp dẫn.'
            ],
            [
                'ten_san_pham' => 'Snack Rong Biển',
                'gia'          => 18000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://cjfoods.com.vn/storage/products/jan-05-snack-seaweed-original-25g-1.jpg',
                'id_danh_muc'  => 14,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Snack rong biển giòn, vị mặn nhẹ tự nhiên.'
            ],
            [
                'ten_san_pham' => 'Snack Bắp Ngọt',
                'gia'          => 14000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://product.hstatic.net/1000281508/product/4e8d3e44f8594e9b908f47591de0f6ed_59013b2cdac44a5a99bc522e0337c826_master.png',
                'id_danh_muc'  => 14,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Snack bắp ngọt hương vị bơ thơm béo.'
            ],
        ];
        // BimBim
        $bimBim = [
            [
                'ten_san_pham' => 'Bim Bim Oishi',
                'gia'          => 10000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'http://bizweb.dktcdn.net/thumb/grande/100/476/945/products/bimbim.png?v=1677681739117',
                'id_danh_muc'  => 15,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bim bim Oishi vị phô mai béo ngậy, giòn tan.'
            ],
            [
                'ten_san_pham' => 'Bim Bim Poca',
                'gia'          => 12000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://pvmarthanoi.com.vn/wp-content/uploads/2022/12/snack-banh-phong-tom-poca-partyz-goi-40g-201911071522372503-500x600.jpg',
                'id_danh_muc'  => 15,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bim bim Poca khoai tây lát mỏng, vị mặn vừa.'
            ],
            [
                'ten_san_pham' => 'Bim Bim Cosy',
                'gia'          => 15000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://pvmarthanoi.com.vn/wp-content/uploads/2023/07/snack-khoai-tay-vi-tu-nhien-my-chiu-lays-goi-60g-202303171517425049.webp',
                'id_danh_muc'  => 15,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bim bim Cosy giòn rụm, hương vị bơ sữa.'
            ],
            [
                'ten_san_pham' => 'Bim Bim Slide',
                'gia'          => 13000,
                'don_vi'       => 'gói',
                'hinh_anh'     => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-loqw9oheq2xced',
                'id_danh_muc'  => 15,
                'so_luong'     => rand(10, 100),
                'mo_ta'        => 'Bim bim Slide vị tảo biển độc đáo, lạ miệng.'
            ],
        ];
        // Xóa bảng trước khi seed lại
        DB::table('san_phams')->truncate();

        // Insert cả 2 loại
        DB::table('san_phams')->insert(array_merge(
            $thit,
            $haiSan,
            $rau,
            $cu,
            $qua,
            $trung,
            $sua,
            $gao,
            $ngu_coc,
            $hat,
            $do_hop,
            $xuc_xich,
            $gia_vi,
            $nuoc_cham,
            $mi,
            $bun,
            $pho_kho,
            $bia_ruou,
            $cafe_tra,
            $nuoc,
            $banhNgot,
            $banhMi,
            $keo,
            $socola,
            $snack,
            $bimBim,
        ));
    }
}
