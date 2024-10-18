-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodgennie`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sanpham` int(10) UNSIGNED NOT NULL,
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `so_luong` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`id`, `id_sanpham`, `id_hoadon`, `so_luong`) VALUES
(304, 1021, 164, 2),
(307, 1001, 166, 3),
(308, 1026, 166, 1),
(309, 1145, 166, 2),
(310, 1021, 167, 5),
(311, 1005, 168, 2),
(312, 1024, 168, 2),
(313, 1021, 169, 3),
(314, 1005, 169, 1),
(315, 1046, 170, 1),
(317, 1007, 172, 6),
(318, 1069, 173, 2),
(319, 1014, 174, 3),
(320, 1026, 175, 2),
(321, 1082, 175, 1),
(322, 1047, 176, 1),
(323, 1148, 176, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `id_phieunhap` int(10) UNSIGNED NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`id_phieunhap`, `id_sp`, `so_luong`) VALUES
(11, 1135, 2),
(13, 1011, 5),
(14, 1149, 2),
(15, 1022, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ctphieutra`
--

CREATE TABLE `ctphieutra` (
  `id_phieutra` int(11) NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ctphieutra`
--

INSERT INTO `ctphieutra` (`id_phieutra`, `id_sp`, `so_luong`) VALUES
(2400, 1001, 2),
(2401, 1011, 4),
(2402, 1006, 2),
(2403, 1006, 6),
(2404, 1148, 2),
(2405, 1148, 2),
(2406, 1148, 2),
(2407, 1007, 5);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_danhmuc` varchar(191) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_danhmuc`, `icon`) VALUES
(1, 'Hóa đơn', '<i class=\"fa-regular fa-file-lines\"></i>'),
(2, 'Thống kê', '<i class=\"fa-solid fa-chart-area\"></i>'),
(5, 'Khách hàng', '<i class=\"fa-solid fa-users\"></i>'),
(6, 'Phiếu trả', '<i class=\"fa-solid fa-truck-ramp-box\"></i>'),
(7, 'Sản phẩm', '<i class=\"fa fa-cubes\" aria-hidden=\"true\"></i>'),
(8, 'Thể loại', '<i class=\"fa fa-sitemap\" aria-hidden=\"true\"></i>'),
(9, 'Phiếu nhập', '<i class=\"fa-solid fa-dolly\"></i>'),
(11, 'Danh mục', '<i class=\"fa-solid fa-diagram-project\"></i>'),
(12, 'Nhà cung cấp', '<i class=\"fa-solid fa-truck\"></i>'),
(13, 'Nhân viên', '<i class=\"fa-solid fa-user-tie\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsp`
--

CREATE TABLE `hinhanhsp` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinhanhsp`
--

INSERT INTO `hinhanhsp` (`id`, `hinh_anh`, `id_sp`) VALUES
(1031, 'mi-khoai-tay-omachi-tom-chua-cay-thai-goi-80g-202209200946163653.jpg', 1063),
(1111, '-202408010852513668.jpg', 1023),
(1112, '-202408010853095371.jpg', 1023),
(1113, '-202408010853098188.jpg', 1023),
(1114, 'rau-mong-toi-tui-500g-202009292357355810.jpg', 1024),
(1115, 'rau-mong-toi-400g-202405061614155110.jpg', 1024),
(1116, 'rau-mong-toi-tui-500g-202009292357361023.jpg', 1024),
(1117, 'rau-mong-toi-tui-500g-202009292357365847.jpg', 1024),
(1118, 'ca-rot-202312081116076334.jpg', 1025),
(1119, 'ca-rot-202312081116078792.jpg', 1025),
(1120, 'ca-rot-202312081116081615.jpg', 1025),
(1121, 'ca-rot-trai-tu-150g-tro-len-202408141033371263.jpg', 1025),
(1122, 'hanh-tay-202312261433144727.jpg', 1026),
(1123, 'hanh-tay-202312261433148046.jpg', 1026),
(1124, 'hanh-tay-202312261433151068.jpg', 1026),
(1125, 'hanh-tay-cu-tu-100g-tro-len-202408141509215742.jpg', 1026),
(1126, 'bi-do-ho-lo-202312271411134968.jpg', 1027),
(1127, 'bi-do-ho-lo-202312271411137609.jpg', 1027),
(1128, 'bi-do-ho-lo-202312271411132419.jpg', 1027),
(1129, 'bi-do-ho-lo-202312271411141080.jpg', 1027),
(1130, 'cai-thia-202312271059011562.jpg', 1128),
(1131, 'cai-thia-202312271059016451.jpg', 1128),
(1132, 'cai-thia-202408141421359888.jpg', 1128),
(1133, 'cai-thia-202408141421347872.jpg', 1128),
(1134, 'ngo-gai-rau-om-202404110910143317.jpg', 1141),
(1135, 'ngo-gai-rau-om-202404110910146127.jpg', 1141),
(1136, 'ngo-gai-rau-om-202404110910153853.jpg', 1141),
(1137, 'ngo-gai-rau-om-202404110910158372.jpg', 1141),
(1138, '-202406200950442294.jpg', 1142),
(1140, '-202406200950451817.jpg', 1142),
(1145, '-202406200950456794.jpg', 1142),
(1146, '-202406200950460243.jpg', 1142),
(1147, 'bap-cai-trang-bap-tu-700g-tro-len-202404171102288487.jpg', 1146),
(1148, 'bap-cai-trang-bap-tu-700g-tro-len-202404171102285952.jpg', 1146),
(1149, 'bap-cai-trang-bap-tu-700g-tro-len-202404171102283396.jpg', 1146),
(1150, 'bap-cai-trang-bap-tu-700g-tro-len-202404171102276681.jpg', 1146),
(1151, 'nuoc-ngot-sprite-huong-chanh-lon-320ml-20.jpg', 1028),
(1152, 'nuoc-ngot-sprite-huong-chanh-lon-320ml-20230.jpg', 1028),
(1153, 'nuoc-ngot-sprite-huong-chanh-lon-320ml-20230620.jpg', 1028),
(1154, 'nuoc-ngot-sprite-huong-chanh-lon-320ml-2023062009091.jpg', 1028),
(1155, 'nuoc-ngot-7-up-lon-330ml-202312252102017018.jpg', 1029),
(1156, 'nuoc-ngot-7-up-lon-330ml-202312252102019548.jpg', 1029),
(1157, 'nuoc-ngot-7-up-lon-330ml-202312252102025883.jpg', 1029),
(1158, 'nuoc-ngot-7-up-lon-330ml-202312252102023690.jpg', 1029),
(1159, 'nuoc-ngot-pepsi-khong-calo-lon-320ml-202405140927583779.jpg', 1030),
(1160, 'nuoc-ngot-pepsi-khong-calo-lon-320ml-202405140927585301.jpg', 1030),
(1161, 'nuoc-ngot-pepsi-khong-calo-lon-320ml-202405140927578665.jpg', 1030),
(1162, 'nuoc-ngot-pepsi-khong-calo-lon-320ml-202405140928004147.jpg', 1030),
(1164, 'nuoc-ngot-fanta-huong-soda-kem-trai-cay-lon-320ml-202212181657498794.jpg', 1031),
(1165, 'nuoc-ngot-fanta-huong-soda-kem-trai-cay-lon-320ml-202212181657502075.jpg', 1031),
(1166, 'nuoc-ngot-fanta-huong-soda-kem-trai-cay-lon-320ml-202212181657515367.jpg', 1031),
(1167, 'nuoc-ngot-fanta-huong-soda-kem-trai-cay-lon-330ml-202202240943126071.jpg', 1031),
(1168, 'nuoc-ngot-mirinda-huong-cam-lon-320ml-202312252142544474.jpg', 1032),
(1169, 'nuoc-ngot-mirinda-huong-cam-lon-320ml-202312252142546764.jpg', 1032),
(1170, 'nuoc-ngot-mirinda-huong-cam-lon-320ml-202312252145459961.jpg', 1032),
(1171, 'nuoc-ngot-mirinda-huong-cam-lon-320ml-202312252146281554.jpg', 1032),
(1172, 'thung-48-hop-sua-tuoi-co-duong-vinamilk-100-sua-tuoi-110ml-202404111440036216.jpg', 1033),
(1173, 'thung-48-hop-sua-tuoi-co-duong-vinamilk-100-sua-tuoi-110ml-202404111440044325.jpg', 1033),
(1174, 'thung-48-hop-sua-tuoi-co-duong-vinamilk-100-sua-tuoi-110ml-202404111440048288.jpg', 1033),
(1175, 'thung-48-hop-sua-tuoi-co-duong-vinamilk-100-sua-tuoi-110ml-202404111440073801.jpg', 1033),
(1176, 'bot-ngot-ajinomoto-goi-454g-202006172147080428.jpg', 1034),
(1177, 'bot-ngot-ajinomoto-goi-454g-202006172147088307.jpg', 1134),
(1178, 'bot-ngot-ajinomoto-goi-454g-202006172147105798.jpg', 1034),
(1179, 'bot-ngot-ajinomoto-goi-454g-202006172147114874.jpg', 1034),
(1180, 'nuoc-ep-trai-cay-jele-l-carnitine-vi-vai-150g-202305270927168903.jpg', 1035),
(1181, 'nuoc-ep-trai-cay-jele-l-carnitine-vi-vai-150g-202305270927173057.jpg', 1035),
(1182, 'nuoc-ep-trai-cay-jele-l-carnitine-vi-vai-150g-202305270927175055.jpg', 1035),
(1183, 'nuoc-ep-trai-cay-jele-l-carnitine-vi-vai-150g-202305270927185284.jpg', 1035),
(1184, 'nuoc-ep-tao-vfresh-1-lit-202209282308183084.jpg', 1047),
(1185, 'nuoc-ep-tao-vfresh-1-lit-202209282308184958.jpg', 1047),
(1186, 'nuoc-ep-tao-vfresh-1-lit-202209282308188253.jpg', 1047),
(1187, 'nuoc-ep-tao-vfresh-1-lit-202209282308192028.jpg', 1047),
(1188, 'nuoc-ep-luu-juss-1-lit-202102222143528516.jpg', 1048),
(1189, 'nuoc-ep-luu-juss-1-lit-202102222143532609.jpg', 1048),
(1190, 'nuoc-ep-luu-juss-1-lit-202102222143556344.jpg', 1048),
(1191, 'nuoc-ep-luu-juss-1-lit-202102222143541945.jpg', 1048),
(1192, 'tra-dao-va-hat-chia-fuze-tea-chai-1-lit-202211261120594163.jpg', 1049),
(1193, 'sellingpoint (2).jpg', 1049),
(1194, 'tra-dao-va-hat-chia-fuze-tea-chai-1-lit-202211261121002795.jpg', 1049),
(1195, 'tra-dao-va-hat-chia-fuze-tea-chai-1-lit-202211261120599189.jpg', 1049),
(1196, 'tra-bi-dao-wonderfarm-chai-440ml-clone-202407171914010554.jpg', 1050),
(1197, 'tra-bi-dao-wonderfarm-280ml-clone-202407171909397869.jpg', 1050),
(1198, 'tra-bi-dao-wonderfarm-280ml-clone-202407171909389293.jpg', 1050),
(1199, 'tra-bi-dao-wonderfarm-chai-440ml-clone-202407171914009151.jpg', 1050),
(1200, 'tra-mat-ong-boncha-vi-tac-chai-450ml-202401271405555240.jpg', 1051),
(1201, 'tra-mat-ong-boncha-vi-tac-chai-450ml-202401271405557631.jpg', 1051),
(1202, 'nuoc-tra-boncha-202401121447348827.jpg', 1051),
(1203, 'tra-mat-ong-boncha-vi-tac-chai-450ml-202401271405572586.jpg', 1051),
(1204, 'thit-heo-xay-meat-master-400g-202303210855348281.jpg', 1052),
(1205, 'thit-heo-xay-meat-master-400g-202303210855352952.jpg', 1052),
(1206, '258328_202408280944467093.jpg', 1052),
(1207, '258328-1_202408280944453902.jpg', 1052),
(1208, 'ba-roi-heo-rut-suon-cp-khay-500g-202111262057566174.jpg', 1053),
(1209, 'ba-roi-heo-rut-suon-cp-khay-500g-202111262057572041.jpg', 1053),
(1210, '2071627091_202409171316075206.jpg', 1053),
(1211, '2071627092-min_202409171316078852.jpg', 1053),
(1212, 'ga-dai-nhap-khau-202402271106417906.jpg', 1054),
(1213, 'ga-dai-nhap-khau-202312251621027068.jpg', 1054),
(1214, '2071627193-min_202409201408400734.jpg', 1054),
(1215, '2071627192-min_202409201408398391.jpg', 1054),
(1220, 'duong-kinh-trang-toan-phat-goi-500g-202003171027092922.jpg', 1006),
(1221, 'duong-kinh-trang-toan-phat-goi-500g-202003171027097114.jpg', 1006),
(1222, 'sellingpoint (1).jpg', 1006),
(1223, 'duong-kinh-trang-toan-phat-goi-500g-202003171027100026.jpg', 1006),
(1224, 'ca-bop-cat-khuc-500g-4-5-khuc-202405271520029107.jpg', 1060),
(1225, 'ca-bop-cat-khuc-500g-4-5-khuc-202405271520041909.jpg', 1060),
(1226, '326098_202408291104368387.jpg', 1060),
(1227, '326098-1_202408291104358909.jpg', 1060),
(1228, 'mi-3-mien-ga-soi-pho-goi-65g-202406201458526367.jpg', 1062),
(1229, 'thung-30-goi-mi-3-mien-ga-soi-pho-goi-65g-202407260915077418.jpg', 1062),
(1230, 'thung-30-goi-mi-3-mien-ga-soi-pho-goi-65g-202406131345058236.jpg', 1062),
(1232, 'mi-khoai-tay-omachi-tom-chua-cay-thai-goi-80g-202209200945463975.jpg', 1063),
(1233, 'mi-khoai-tay-omachi-tom-chua-cay-thai-goi-80g-202209200945506508.jpg', 1063),
(1234, 'mi-khoai-tay-omachi-tom-chua-cay-thai-goi-80g-202209200945497450.jpg', 1063),
(1235, 'mi-hao-100-tom-chua-cay-goi-65g-201911061454028173.jpg', 1064),
(1236, 'mi-hao-100-tom-chua-cay-goi-65g-clone-202405141433503653.jpg', 1064),
(1237, 'mi-hao-100-tom-chua-cay-goi-65g-clone-202405141433508954.jpg', 1064),
(1238, 'mi-hao-100-tom-chua-cay-goi-65g-clone-202405141433496672.jpg', 1064),
(1239, '-202303231609238570.jpg', 1065),
(1240, '-202303231609242531.jpg', 1065),
(1241, '-202303231609245730.jpg', 1065),
(1242, '-202303231609256123.jpg', 1065),
(1243, 'hu-tieu-suon-heo-cung-dinh-goi-84g-202307271513378863.jpg', 1066),
(1244, 'hu-tieu-suon-heo-cung-dinh-goi-84g-202307271513382114.jpg', 1066),
(1245, 'hu-tieu-suon-heo-cung-dinh-goi-84g-202307271513389920.jpg', 1066),
(1246, 'hu-tieu-suon-heo-cung-dinh-goi-84g-202307271513392191.jpg', 1066),
(1247, 'hu-tieu-nhip-song-vi-nam-vang-70g-2-700x467.jpg', 1067),
(1248, 'hu-tieu-nam-vang-nhip-song-goi-70g-202204281224204413.jpg', 1067),
(1249, 'hu-tieu-nhip-song-vi-nam-vang-70g-3-700x467.jpg', 1067),
(1250, 'hu-tieu-nam-vang-nhip-song-goi-70g-202202101652253752.jpg', 1067),
(1251, 'pho-bo-tai-lan-de-nhat-goi-68g-202212251138304495.jpg', 1068),
(1252, 'pho-bo-tai-lan-de-nhat-goi-68g-202212251138307604.jpg', 1068),
(1253, 'pho-bo-tai-lan-de-nhat-goi-68g-202211241719241385.jpg', 1068),
(1254, 'pho-bo-tai-lan-de-nhat-goi-68g-202212251138322021.jpg', 1068),
(1255, 'pho-ga-de-nhat-goi-65g-202407061035274016.jpg', 1069),
(1256, 'pho-ga-de-nhat-goi-65g-202407061035276732.jpg', 1069),
(1257, 'pho-ga-de-nhat-goi-65g-202407061035278955.jpg', 1069),
(1258, 'pho-ga-de-nhat-goi-65g-202407061035286312.jpg', 1069),
(1259, 'pho-bo-truyen-thong-nuoc-trong-chinsu-pho-story-goi-131g-bap-bo-va-gan-nguyen-mieng-202308011554159040.jpg', 1070),
(1260, 'pho-bo-truyen-thong-nuoc-trong-chinsu-pho-story-goi-131g-bap-bo-va-gan-nguyen-mieng-202308011554186619.jpg', 1070),
(1261, 'pho-bo-truyen-thong-nuoc-trong-chinsu-pho-story-goi-131g-bap-bo-va-gan-nguyen-mieng-202308011554214314.jpg', 1070),
(1262, 'pho-bo-truyen-thong-nuoc-trong-chinsu-pho-story-goi-131g-bap-bo-va-gan-nguyen-mieng-202308011554223015.jpg', 1070),
(1263, 'nuoc-khoang-i-on-life-450ml-202002222139461868.jpg', 1071),
(1264, 'nuoc-khoang-i-on-life-450ml-202002222139465138.jpg', 1071),
(1265, 'nuoc-khoang-i-on-life-450ml-202002222139468418.jpg', 1071),
(1267, 'nuoc-khoang-i-on-life-450ml-202002222139473598.jpg', 1071),
(1278, 'nuoc-khoang-vikoda-15-lit-202107100907132207.jpg', 1072),
(1279, 'nuoc-khoang-vikoda-15-lit-202107100907135332.jpg', 1072),
(1280, 'nuoc-khoang-vikoda-15-lit-202107100907138198.jpg', 1072),
(1281, 'nuoc-khoang-vikoda-15-lit-202107100907143413.jpg', 1072),
(1282, 'nuoc-tinh-khiet-lama-500ml-202008191320547981.jpg', 1073),
(1283, 'nuoc-tinh-khiet-lama-500ml-202008191320549893.jpg', 1073),
(1284, 'nuoc-tinh-khiet-lama-500ml-202008191320552604.jpg', 1073),
(1285, 'nuoc-tinh-khiet-lama-500ml-202008191320554796.jpg', 1073),
(1286, 'nuoc-khoang-danh-thanh-vi-chanh-muoi-430ml-202106290837399678.jpg', 1074),
(1287, 'nuoc-khoang-danh-thanh-vi-chanh-muoi-430ml-202106290837402660.jpg', 1074),
(1288, 'nuoc-khoang-danh-thanh-vi-chanh-muoi-430ml-202106290837407518.jpg', 1074),
(1289, 'nuoc-khoang-danh-thanh-vi-chanh-muoi-430ml-202106290837414163.jpg', 1074),
(1290, 'nuoc-uong-good-mood-vi-sua-chua-455ml-202407111335443811.jpg', 1077),
(1291, 'nuoc-uong-good-mood-vi-sua-chua-455ml-202407111336145579.jpg', 1077),
(1292, 'nuoc-uong-good-mood-vi-sua-chua-455ml-202407111336152273.jpg', 1077),
(1293, 'nuoc-uong-good-mood-vi-sua-chua-455ml-202407111336164058.jpg', 1077),
(1294, 'soda-schweppes-lon-330ml-202401091732426460.jpg', 1078),
(1295, 'soda-schweppes-lon-330ml-202401091732429062.jpg', 1078),
(1296, 'soda-schweppes-lon-330ml-202401091732434113.jpg', 1078),
(1297, 'soda-schweppes-lon-330ml-202401091732436683.jpg', 1078),
(1298, 'thit-ba-chi-bo-my-cat-cuon-orifood-khay-300g-202304031521581225.jpg', 1079),
(1299, 'thit-ba-chi-bo-my-cat-cuon-orifood-khay-300g-202304031521569734.jpg', 1079),
(1300, 'thit-ba-chi-bo-my-cat-cuon-orifood-khay-300g-202304031521557103.jpg', 1079),
(1301, 'thit-ba-chi-bo-my-cat-cuon-orifood-khay-300g-202304031522012325.jpg', 1079),
(1302, 'nuoc-ep-co-thach-dua-jele-x-huong-nho-320ml-clone-202407121530221452.jpg', 1080),
(1303, 'loc-6-hop-sua-dau-nanh-co-duong-fami-canxi-200ml-202407161353213030.jpg', 1081),
(1304, 'loc-6-hop-sua-dau-nanh-co-duong-fami-canxi-200ml-202407161353219573.jpg', 1081),
(1305, 'loc-6-hop-sua-dau-nanh-co-duong-fami-canxi-200ml-202407161353223701.jpg', 1081),
(1306, 'muc-ong-nguyen-con-khay-500g-15-20cm-con-202207221121044455.jpg', 1082),
(1307, 'muc-ong-nguyen-con-khay-500g-15-20cm-con-202203071427329794.jpg', 1082),
(1308, 'httpscdnv2tgddvnbhx-staticbhxproductsimages8782233753bhx233753-1202408301038109526_202409061539227817.jpg', 1082),
(1309, 'httpscdnv2tgddvnbhx-staticbhxproductsimages8782233753bhx233753-2202408301038132252_202409061539230034.jpg', 1082),
(1311, 'pate-thit-dong-hop-cot-den-hai-phong-ha-long-hop-90g-202201040819001650.jpg', 1083),
(1312, 'pate-thit-dong-hop-cot-den-hai-phong-ha-long-hop-90g-202201040819005135.jpg', 1083),
(1313, 'pate-thit-dong-hop-cot-den-hai-phong-ha-long-hop-90g-202201040819013696.jpg', 1083),
(1314, 'pate-thit-dong-hop-cot-den-hai-phong-ha-long-hop-90g-202201040819017524.jpg', 1083),
(1315, 'pate-gan-ha-long-170g-2-700x467.jpg', 1084),
(1316, 'pate-gan-ha-long-170g-4-700x467.jpg', 1084),
(1317, 'pate-gan-ha-long-170g-5-700x467.jpg', 1084),
(1318, 'pate-gan-ha-long-170g-3-700x467.jpg', 1084),
(1319, 'thit-vien-xot-ca-chua-cay-thi-120g-202405311019414383.jpg', 1085),
(1320, 'bo-hai-lat-vissan-hop-170g-201908231421197157.jpg', 1086),
(1321, 'bo-hai-lat-vissan-hop-170g-201908231421199159.jpg', 1086),
(1322, 'bo-hai-lat-vissan-hop-170g-201908231421282069.jpg', 1086),
(1323, 'bo-hai-lat-vissan-hop-170g-201908231421373730.jpg', 1086),
(1324, 'thit-heo-spam-classic-hormel-foods-hop-340g-201910061032078950.jpg', 1087),
(1325, 'thit-hop-spam-340g-4-700x467.jpg', 1087),
(1326, 'thit-hop-spam-340g-5-700x467.jpg', 1087),
(1327, 'sellingpoint (3).jpg', 1087),
(1328, 'ca-nuc-kho-tieu-sea-crown-hop-155g-201905211925072786.jpg', 1088),
(1329, 'ca-nuc-kho-tieu-sea-crown-hop-155g-201905211925074035.jpg', 1088),
(1330, 'ca-nuc-kho-tieu-155gam-5-700x467.jpg', 1088),
(1331, 'sellingpoint (4).jpg', 1088),
(2222, 'thit-dui-heo-meat-master-400g-202303210853565559.jpg', 1017),
(2223, 'thit-dui-heo-meat-master-400g-202303210853575396.jpg', 1017),
(2224, 'thit-dui-heo-meat-master-400g-202303210853583004.jpg', 1017),
(2225, 'thit-dui-heo-meat-master-400g-202408141646236839.jpg', 1017),
(2226, 'ba-roi-heo-meat-master-400g-202303210839210459.jpg', 1018),
(2227, 'ba-roi-heo-meat-master-400g-202303210839226705.jpg', 1018),
(2228, 'ba-roi-heo-meat-master-400g-202408141130071525.jpg', 1018),
(2229, 'ba-roi-heo-meat-master-400g-202408141130079328.jpg', 1018),
(2230, 'dui-canh-ga-tuoi-khay-500g-6-8-dui-202111261956090593.jpg', 1019),
(2231, 'dui-canh-ga-tuoi-khay-500g-6-8-dui-202111261956095855.jpg', 1019),
(2232, 'dui-canh-ga-tuoi-khay-500g-202105200058491572.jpg', 1019),
(2233, 'dui-canh-ga-tuoi-cp-500g-6-8-dui-202408141054451667.jpg', 1019),
(2234, 'chan-ga-tuoi-202403011655289144.jpg', 1020),
(2235, 'chan-ga-tuoi-202403011655286806.jpg', 1020),
(2236, 'chan-ga-tuoi-202408141607534073.jpg', 1020),
(2237, 'chan-ga-tuoi-202408141607490186.jpg', 1020),
(2238, 'dui-ga-goc-tu-202403011654083801.jpg', 1021),
(2239, 'dui-ga-goc-tu-202408141056545723.jpg', 1021),
(2240, 'dui-ga-goc-tu-202408141056485561.jpg', 1021),
(2241, '-202407081602340792.jpg', 1022),
(2242, '-202407081602534936.jpg', 1022),
(2243, '-202407081603235198.jpg', 1022),
(2244, '-202407082248561083.jpg', 1139),
(2245, '-202407082248597599.jpg', 1139),
(2246, '-202407082249002660.jpg', 1139),
(2247, '-202407082249029652.jpg', 1139),
(2248, 'tom-the-nguyen-con-202403061037383281.jpg', 1140),
(2249, 'tom-the-nguyen-con-202403061037385585.jpg', 1140),
(2250, 'tom-the-nguyen-con-202408171049003484.jpg', 1140),
(2251, 'tom-the-nguyen-con-202408171049013827.jpg', 1140),
(2252, 'suon-non-heo-cp-500g-5-7-mieng-202401301654404985.jpg', 1055),
(2253, 'suon-non-heo-cp-500g-5-7-mieng-202401301654410239.jpg', 1055),
(2254, 'suon-non-heo-cp-500g-5-7-mieng-202401301702382891.jpg', 1055),
(2255, '2071626644_202408291115590651.jpg', 1055),
(2256, 'rau-muc-nhap-khau-202405072312593020.jpg', 1056),
(2257, 'rau-muc-nhap-khau-202405072312591130.jpg', 1056),
(2258, 'httpscdnv2tgddvnbhx-staticbhxproductsimages8782273352bhx273352202408301118292725_202409061553223329.jpg', 1056),
(2259, 'httpscdnv2tgddvnbhx-staticbhxproductsimages8782273352bhx273352-1202408301118282888_202409061553225232.jpg', 1056),
(2260, 'ca-basa-phi-le-202405091054513197.jpg', 1057),
(2261, '233812-3_202408311534565365.jpg', 1057),
(2262, '233812-2_202408311534562815.jpg', 1057),
(2263, 'bao-quan-va-luu-y_202408311556333346.jpg', 1057),
(2264, 'ca-dieu-hong-lam-sach-202405072353183502.jpg', 1058),
(2265, 'ca-dieu-hong-lam-sach-202405072353179693.jpg', 1058),
(2267, '240466_202408290819125633.jpg', 1058),
(2268, '240466-1_202408290819112126.jpg', 1058),
(2269, 'ca-hu-nguyen-con-lam-sach-08kg-11kg-202303311334430882.jpg', 1059),
(2270, 'ca-hu-nguyen-con-lam-sach-08kg-11kg-202303311334578755.jpg', 1059),
(2271, 'ca-hu-nguyen-con-lam-sach-08kg-11kg-202303311335513576.jpg', 1059),
(2272, 'ca-hu-nguyen-con-lam-sach-08kg-11kg-202303311334582573.jpg', 1059),
(2274, 'nuoc-tinh-khiet-jovita-500ml-202307291804389324.jpg', 1061),
(2275, 'nuoc-tinh-khiet-jovita-500ml-202307291804392411.jpg', 1061),
(2276, 'nuoc-tinh-khiet-jovita-500ml-202307291804398085.jpg', 1061),
(2277, 'nuoc-tinh-khiet-jovita-500ml-202307291804401411.jpg', 1061),
(2279, 'nuoc-khoang-co-ga-danh-thanh-sparkling-430ml-202106290844176065.jpg', 1075),
(2280, 'nuoc-khoang-co-ga-danh-thanh-sparkling-430ml-202106290844181019.jpg', 1075),
(2281, 'nuoc-khoang-co-ga-danh-thanh-sparkling-430ml-202202211604459394.jpg', 1075),
(2282, 'nuoc-khoang-co-ga-vinh-hao-500ml-201903181334224938.jpg', 1076),
(2283, 'nuoc-khoang-co-ga-vinh-hao-500ml-201903181334227339.jpg', 1076),
(2284, 'nuoc-khoang-co-ga-vinh-hao-500ml-202002121617051818.jpg', 1076),
(2285, 'nuoc-khoang-co-ga-vinh-hao-500ml-201903181334232102.jpg', 1076),
(3333, 'ca-saba-nhat-xot-ca-3-co-gai-hop-300g-202005051102404629.jpg', 1011),
(3334, 'ca-saba-nhat-xot-ca-3-co-gai-hop-300g-202202101351501466.jpg', 1011),
(3335, 'ca-saba-nhat-xot-ca-3-co-gai-hop-300g-202005051102524995.jpg', 1011),
(3336, 'ca-saba-nhat-xot-ca-3-co-gai-hop-300g-202005051102516950.jpg', 1011),
(3337, 'ca-trich-sot-ca-sea-crown-hop-155g-201905211926512185.jpg', 1012),
(3338, 'ca-trich-sot-ca-sea-crown-hop-155g-201905211926514215.jpg', 1012),
(3339, 'ca-trich-sot-ca-155-gam-5-org.jpg', 1012),
(3340, 'sellingpoint.jpg', 1012),
(3341, 'thit-heo-vien-heo-cao-boi-an-lien-vi-xot-ca-masan-hop-200g-202110231632587327.jpg', 1013),
(3342, 'thit-heo-vien-heo-cao-boi-an-lien-vi-xot-ca-masan-hop-200g-202110231632592802.jpg', 1013),
(3343, 'thit-heo-vien-heo-cao-boi-an-lien-vi-xot-ca-masan-hop-200g-202110231633024806.jpg', 1013),
(3344, 'sellingpointtnn.jpg', 1013),
(3345, 'ca-ngu-xot-ca-ri-tuna-viet-nam-hop-155g-202110301536155644.jpg', 1014),
(3346, 'ca-ngu-xot-ca-ri-tuna-viet-nam-hop-155g-202110301536160802.jpg', 1014),
(3347, 'ca-ngu-xot-ca-ri-tuna-viet-nam-hop-155g-202110301536177397.jpg', 1014),
(3348, 'sellingpointth.jpg', 1014),
(3349, 'mi-tron-omachi-xot-tom-pho-mai-trung-muoi-hop-105g-202210290916471340.jpg', 1015),
(3350, 'mi-khoai-tay-omachi-tron-xot-tom-pho-mai-trung-muoi-hop-105g-201910211438101745.jpg', 1015),
(3351, 'mi-khoai-tay-omachi-tron-xot-tom-pho-mai-trung-muoi-hop-105g-201910211438156575.jpg', 1015),
(3352, 'mi-khoai-tay-omachi-tron-xot-tom-pho-mai-trung-muoi-hop-105g-201910211438136075.jpg', 1015),
(3353, 'mi-khoai-tay-omachi-tom-chua-cay-thai-to-91g-202209200958108399.jpg', 1016),
(3354, 'mi-khoai-tay-omachi-tom-chua-cay-thai-to-91g-202209200958115600.jpg', 1016),
(3355, 'mi-khoai-tay-omachi-tom-chua-cay-thai-to-91g-202209200958150416.jpg', 1016),
(3356, 'mi-khoai-tay-omachi-tom-chua-cay-thai-to-91g-202209200958146314.jpg', 1016),
(3357, 'ca-he-lam-sach-450-550g-3-7-con-202403071421147363.jpg', 1147),
(3358, 'ca-he-lam-sach-450-550g-3-7-con-202403071421155472.jpg', 1147),
(3359, 'ca-he-lam-sach-450-550g-3-7-con-202403071421143259.jpg', 1147),
(3360, 'ca-he-lam-sach-450-550g-3-7-con-202403071421151702.jpg', 1147),
(3361, 'banh-pizza-3-loai-thit-pho-mai-kitkool-hop-140g-202403251004094804.jpg', 1151),
(3362, 'banh-pizza-3-loai-thit-pho-mai-kitkool-hop-140g-202403251004097966.jpg', 1151),
(3363, 'banh-pizza-3-loai-thit-pho-mai-kitkool-hop-140g-202403251004107330.jpg', 1151),
(3364, 'banh-pizza-3-loai-thit-pho-mai-kitkool-hop-140g-202403251004113165.jpg', 1151),
(4444, 'nuoc-ngot-coca-cola-zero-320ml-202201131326507695.jpg', 1007),
(4445, 'nuoc-ngot-coca-cola-zero-320ml-202201131326510885.jpg', 1007),
(4446, 'nuoc-ngot-coca-cola-zero-320ml-202201131326520876.jpg', 1007),
(4447, 'nuoc-ngot-coca-cola-zero-lon-320ml-202202231944236205.jpg', 1007),
(4448, '6-lon-nuoc-ngot-pepsi-cola-320ml-202405140913350279.jpg', 1008),
(4449, '6-lon-nuoc-ngot-pepsi-cola-320ml-202405140913355432.jpg', 1008),
(4450, '6-lon-nuoc-ngot-pepsi-cola-320ml-202405140913347906.jpg', 1008),
(4451, '6-lon-nuoc-ngot-pepsi-cola-320ml-202405140913375290.jpg', 1008),
(4452, 'nuoc-tang-luc-sting-sleek-huong-dau-320ml-202111061723498584.jpg', 1009),
(4453, 'nuoc-tang-luc-sting-sleek-huong-dau-320ml-202111061723491698.jpg', 1009),
(4454, 'nuoc-tang-luc-sting-sleek-huong-dau-320ml-202211041423237135.jpg', 1009),
(4455, 'nuoc-tang-luc-sting-sleek-huong-dau-320ml-202111061723459206.jpg', 1009),
(4456, 'nuoc-tang-luc-sting-vang-lon-cao-330ml-1511201815591.jpg', 1010),
(4457, 'nuoc-tang-luc-sting-gold-320ml-202304101624386654.jpg', 1010),
(4458, 'nuoc-tang-luc-sting-vang-lon-cao-330ml-15112018155916.jpg', 1010),
(4459, 'nuoc-tang-luc-sting-gold-320ml-202211041428009201.jpg', 1010),
(4460, 'nuoc-ep-teppy-pet-1l-2-org.jpg', 1129),
(4461, 'nuoc-ep-cam-teppy-nguyen-tep-loc-6-chai-5-org.jpg', 1129),
(4462, '6-chai-nuoc-cam-co-tep-teppy-327ml-202202122152198509.jpg', 1129),
(4463, '6-chai-nuoc-cam-co-tep-teppy-327ml-202204231845475112.jpg', 1129),
(4464, 'tra-den-c2-huong-dao-chai-230ml-202310230824365148.jpg', 1130),
(4465, 'tra-den-c2-huong-dao-chai-230ml-202310230824382691.jpg', 1130),
(4466, 'tra-den-c2-huong-dao-chai-230ml-202310230824379938.jpg', 1130),
(4467, 'tra-den-c2-huong-dao-chai-230ml-202202122318407207.jpg', 1130),
(4468, 'nuoc-khoang-la-vie-350ml-202112310822437928.jpg', 1145),
(4469, 'nuoc-khoang-la-vie-350ml-202112310822442209.jpg', 1145),
(4470, 'nuoc-khoang-la-vie-350ml-202204161512188745.jpg', 1145),
(4471, 'nuoc-khoang-la-vie-350ml-202202131325347898.jpg', 1145),
(5555, 'anhdauan.jpg', 1001),
(5556, 'dau-hat-cai-nguyen-chat-simply-chai-1-lit.jpg', 1001),
(5557, 'dau-hat-cai-nguyen-chat-simply-chai-1-lit-2.jpg', 1001),
(5558, 'dau-dau-nanh-nguyen-chat-simply-can-5-lit-202308081107028399.jpg', 1002),
(5559, 'dau-dau-nanh-nguyen-chat-simply-can-5-lit-202201181539252654.jpg', 1002),
(5560, 'dau-dau-nanh-nguyen-chat-simply-can-5-lit-202106031431178183.jpg', 1002),
(5561, 'tuong-ot-chinsu-wasabi-chai-250g-202306170804079977.jpg', 1003),
(5562, 'tuong-ot-chinsu-wasabi-chai-250g-202306170804082512.jpg', 1003),
(5563, 'tuong-ot-chinsu-wasabi-chai-250g-202306170804090398.jpg', 1003),
(5564, 'muoi-tom-kieu-tay-ninh-dh-foods-hu-120g-202405200759424464.jpg', 1004),
(5565, 'muoi-tom-kieu-tay-ninh-dh-foods-hu-120g-202405200759422739.jpg', 1004),
(5567, 'muoi-tom-kieu-tay-ninh-dh-foods-hu-110g-202003161016415447.jpg', 1004),
(5568, 'muoi-tom-kieu-tay-ninh-dh-foods-hu-120g-202405200759420668.jpg', 1004),
(5569, 'hat-nem-thit-than-xuong-ong-tuy-knorr-goi-900g-202203302002567432.jpg', 1005),
(5570, 'hat-nem-thit-than-xuong-ong-tuy-knorr-goi-900g-202303061326411779.jpg', 1005),
(5571, 'hat-nem-thit-than-xuong-ong-tuy-knorr-goi-900g-202203302002574319.jpg', 1005),
(5572, 'hat-nem-thit-than-xuong-ong-tuy-knorr-goi-900g-202203302002579332.jpg', 1005),
(5580, 'nuoc-tuong-dau-nanh-thanh-diu-maggi-chai-450ml-202308121813517143.jpg', 1137),
(5581, 'nuoc-tuong-dau-nanh-thanh-diu-maggi-chai-450ml-202308121813522060.jpg', 1137),
(5582, 'nuoc-tuong-dau-nanh-thanh-diu-maggi-chai-450ml-202308121813527008.jpg', 1137),
(5583, 'nuoc-tuong-dau-nanh-thanh-diu-maggi-chai-450ml-202308121813519516.jpg', 1137),
(5584, 'nuoc-mam-nam-ngu-10-do-dam-chai-500ml-202306211032176857.jpg', 1138),
(5585, 'nuoc-mam-nam-ngu-10-do-dam-chai-500ml-202306211032185413.jpg', 1138),
(5586, 'nuoc-mam-nam-ngu-10-do-dam-chai-500ml-202306211032181293.jpg', 1138),
(5587, 'sellingpointxx.jpg', 1138),
(5588, 'sot-mayonnaise-simply-huong-gao-rang-chai-230g-202011230918238966.jpg', 1143),
(5589, 'sot-mayonnaise-simply-huong-gao-rang-chai-230g-202011230918243369.jpg', 1143),
(5590, 'sot-mayonnaise-simply-huong-gao-rang-chai-230g-202011230918259189.jpg', 1143),
(5591, 'sot-mayonnaise-simply-huong-gao-rang-chai-230g-202011230918249723.jpg', 1143),
(6650, 'nectar-trai-cay-nhiet-doi-fontana-1-lit-202003281106066922.jpg', 1148),
(6651, 'nuoc-ep-trai-cay-nhiet-doi-fontana-1-lit-202202251637111196.jpg', 1148),
(6666, 'sua-tuoi-tiet-trung-it-duong-th-true-milk-hop-1-lit-202104081703261728.jpg', 1131),
(6667, 'sua-tuoi-tiet-trung-th-true-milk-it-duong-1-lit-201811250156219577.jpg', 1131),
(6668, 'sua-tuoi-tiet-trung-th-true-milk-it-duong-hop-1-lit-201811281128448879.jpg', 1131),
(6669, 'sua-tuoi-tiet-trung-it-duong-th-true-milk-hop-1-lit-202202221055162815.jpg', 1131),
(6670, 'sua-tiet-trung-khong-duong-dutch-lady-bich-180ml-202308150958355288.jpg', 1132),
(6671, 'sua-tiet-trung-khong-duong-dutch-lady-bich-180ml-202308150958358538.jpg', 1132),
(6672, 'sua-tiet-trung-khong-duong-dutch-lady-bich-180ml-202308150958366706.jpg', 1132),
(6673, 'sua-tiet-trung-khong-duong-dutch-lady-bich-180ml-202308150958364013.jpg', 1132),
(6674, 'sua-dau-nanh-nguyen-chat-it-duong-fami-bich-200ml-202408011310069877.jpg', 1133),
(6675, 'sua-dau-nanh-nguyen-chat-it-duong-fami-bich-200ml-202408011310076238.jpg', 1133),
(6676, 'sua-dau-nanh-nguyen-chat-it-duong-fami-bich-200ml-202408011310024037.jpg', 1133),
(6677, 'loc-4-hop-sua-lua-mach-cacao-it-duong-milo-active-go-115ml-202407151506552711.jpg', 1134),
(6678, 'loc-4-hop-sua-lua-mach-cacao-it-duong-milo-active-go-115ml-202407151506559565.jpg', 1134),
(6679, 'loc-4-hop-sua-lua-mach-cacao-it-duong-milo-active-go-115ml-202407151506584884.jpg', 1134),
(6680, 'loc-4-hop-sua-lua-mach-cacao-it-duong-milo-active-go-115ml-202407151506547240.jpg', 1134),
(6681, 'loc-4-hop-sua-lua-mach-vi-socola-ovaltine-bo-sung-canxi-180ml-202305061029439502.jpg', 1135),
(6682, 'loc-4-hop-sua-lua-mach-vi-socola-ovaltine-bo-sung-canxi-180ml-202305061029447310.jpg', 1135),
(6683, 'loc-4-hop-sua-lua-mach-vi-socola-ovaltine-bo-sung-canxi-180ml-202305061029450375.jpg', 1135),
(6684, 'loc-4-hop-sua-lua-mach-vi-socola-ovaltine-bo-sung-canxi-180ml-202305061029465613.jpg', 1135),
(6685, 'loc-4-hop-sua-chua-uong-huong-bac-ha-va-viet-quat-yomost-170ml-202310071730499249.jpg', 1136),
(6686, 'loc-4-hop-sua-chua-uong-huong-bac-ha-va-viet-quat-yomost-170ml-202310071730505019.jpg', 1136),
(6687, 'loc-4-hop-sua-chua-uong-huong-bac-ha-va-viet-quat-yomost-170ml-202310071730517686.jpg', 1136),
(6688, 'loc-4-hop-sua-chua-uong-huong-bac-ha-va-viet-quat-yomost-170ml-202310071730522530.jpg', 1136),
(6689, 'nuoc-tinh-khiet-aquafina-355ml-202407091406304694.jpg', 1144),
(6690, 'nuoc-tinh-khiet-aquafina-355ml-202407091406307369.jpg', 1144),
(6691, 'nuoc-tinh-khiet-aquafina-355ml-202407091406309873.jpg', 1144),
(6692, 'nuoc-tinh-khiet-aquafina-355ml-202407091406315509.jpg', 1144),
(6693, 'nectar-trai-cay-nhiet-doi-fontana-1-lit-202003281106070794.jpg', 1148),
(6694, 'nectar-trai-cay-nhiet-doi-fontana-1-lit-202003281106077298.jpg', 1148),
(6771, 'thung-48-hop-sua-chua-uong-huong-dau-yomost-170ml-202310071756579913.jpg', 1149),
(6772, 'thung-48-hop-sua-chua-uong-huong-dau-yomost-170ml-202104091435472062.jpg', 1149),
(6773, 'thung-48-hop-sua-chua-uong-huong-dau-yomost-170ml-202310071757026881.jpg', 1149),
(6774, 'thung-48-hop-sua-chua-uong-huong-dau-yomost-170ml-202310071757022149.jpg', 1149),
(6775, 'thung-48-hop-sua-chua-uong-huong-viet-quat-th-true-yogurt-180ml-202212271136133023.jpg', 1150),
(6776, 'thung-48-hop-sua-chua-uong-huong-viet-quat-th-true-yogurt-180ml-202202231414087162.jpg', 1150),
(6777, 'scu-th-milk-viet-quat-180ml-thung-48-loc-3-org.jpg', 1150),
(6778, 'scu-th-milk-viet-quat-180ml-thung-48-loc-5-org.jpg', 1150),
(6790, 'nuoc-khoang-co-ga-danh-thanh-sparkling-430ml-202106290844171362(1).jpg', 1075);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_khachhang` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_nhanvien` int(10) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_khachhang`, `tong_tien`, `ngay_tao`, `id_nhanvien`, `trang_thai`) VALUES
(164, 15, 58200, '2024-10-17 05:54:25', 3333339, 1),
(166, 15, 231300, '2024-10-17 05:58:02', 3333339, 1),
(167, 16, 145500, '2024-10-17 06:02:59', 3333339, 1),
(168, 16, 170000, '2024-10-17 06:07:54', 333333, 1),
(169, 19, 162300, '2024-10-17 06:14:00', 333333, 1),
(170, 19, 7000, '2024-10-17 06:14:50', 333333, 1),
(172, 20, 67200, '2024-10-17 06:19:26', 3333339, 1),
(173, 20, 15400, '2024-10-17 06:20:43', 3333339, 1),
(174, 20, 51000, '2024-10-17 06:30:49', 11189, 1),
(175, 20, 154000, '2024-10-17 06:35:00', 11189, 1),
(176, 23, 165500, '2024-10-17 06:46:47', 11189, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_kh` varchar(191) NOT NULL,
  `ten_dangnhap` varchar(191) NOT NULL,
  `mat_khau` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `dia_chi` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `tong_tien_muahang` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten_kh`, `ten_dangnhap`, `mat_khau`, `email`, `dia_chi`, `phone`, `ngay_tao`, `ngay_sua`, `tong_tien_muahang`, `trangthai`) VALUES
(15, 'Nguyễn Thị Như Ý', 'NhuY', 'Nhdy%974ndg', 'ynh25@gmail.com', '341, tổ 23 xã Bình Phước Xuân, Chợ Mới, An Giang', '0485622298', '2024-09-15 23:31:37', '2024-09-16 01:01:16', 1390000, 0),
(16, 'Lê Nguyễn Hải Phong', 'phongMax', 'jdgfgJK#8465', 'phongMax98@gmail.com', '12 Nguyễn Văn Bảo, phường 4, Gò Vấp, Thành Phố Hồ Chí Minh, Việt Nam', '0864498221', '2024-09-16 00:22:34', '2024-09-16 17:03:52', 2535000, 0),
(17, 'Nguyễn Thị Tơ', 'ToNN', 'ieyHMr*j23', 'ToNg2947@gmail.com', '134/08 Lê Đại Hành, quận 10, TP.HCM', '0854622900', '2024-09-16 01:12:18', '2024-09-16 01:56:13', 468100, 0),
(19, 'Nguyễn Hoàng Long', 'LoggN', 'dsjgf#H2973', 'LongNN@gmail.com', '12 Phố Hàn Huyên, Nha Trang', '0856822198', '2024-09-16 14:29:36', '2024-09-16 17:04:26', 738700, 0),
(20, 'Tạ Gia Vy', 'VyTa', 'Hfs*7286a', 'vyvy10@gmail.com', '122/10 Tạ Quang Bửu, quận 1, TP.HCM', '0865266104', '2024-09-16 18:38:02', '2024-09-16 23:48:03', 981600, 0),
(21, 'Lê Hoàng Anh', 'Anhta', 'Anhta@123', 'Anhta19@gmail.com', '134/40 Trần Hưng Đạo, quận 3, TP.HCM', '0476986711', '2024-09-17 13:42:08', '2024-09-17 13:59:42', 3023000, 0),
(22, 'Nguyễn Gia Bảo', 'beobeo01', 'Beobeo01!', 'Beobeo@gmail.com', 'tổ 16, ấp Bình Trung, xã Bình Phước Xuân, CM-AG', '0467622874', '2024-09-18 13:14:35', '2024-09-26 10:42:41', 176000, 0),
(23, 'Nguyễn Trúc Quỳnh', 'quynhNg', 'iyH^938sn', 'Zyn24@gmail.com', '24 Lê Thống Nhất, q6, TP.HCM', '0385622761', '2024-09-26 10:46:48', '2024-09-26 10:28:50', 481500, 0),
(25, 'Đỗ Thùy Dương', 'Duong20', '38&hgsHo', 'dng09@gmail.com', '109 Phạm Văn Đồng, q.Bình Thạnh, TP.HCM', '0476991022', '2024-09-26 11:03:46', '2024-09-26 11:56:05', 233600, 0),
(26, 'Phạm Minh Hằng', 'PhamH', 'hGh7e%397d', 'hanPan@gmail.com', '209/10 phố Lê Minh, Hà Nội', '0476221986', '2024-09-26 11:08:45', '2024-09-26 11:27:42', 245200, 0),
(27, 'Trịnh Thị Thu Hà', 'HaTrinh', 'kHF#39&d', 'hatrh@gmail.com', '165/12 Đồng Châu, tỉnh Thái Bình', '0856221979', '2024-09-26 11:25:49', '2024-09-26 11:43:44', 59500, 0),
(28, 'Nguyễn Thanh Tùng', 'stmpt', 'dHg&53ng', 'mtp@gmail.com', '132/9 Đường Lê Quốc Tuấn, quận 1, TP.HCM', '0994751198', '2024-09-26 11:36:00', '2024-09-26 11:39:48', 113000, 0),
(29, 'Nguyễn Thị Xuân Trang', 'chang56', 'fgmnJGF$97', 'trangNg@gmail.com', '24 đường Hàm Nghi, Châu Đốc An Giang', '0347856231', '2024-09-26 11:39:48', '2024-09-26 11:11:41', 554400, 0),
(30, 'Trần Quốc Cường', 'quocg', 'JgKK@5975', 'cuong1@gmail.com', '', '0586411973', '2024-09-26 11:51:07', '2024-09-26 11:51:07', 803000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `id` int(20) NOT NULL,
  `TenLoaiNV` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loainhanvien`
--

INSERT INTO `loainhanvien` (`id`, `TenLoaiNV`) VALUES
(1, 'Nhân viên bán hàng'),
(2, 'Giám đốc cửa hàng'),
(3, 'Nhân viên kho'),
(4, 'Nhân viên tư vấn');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `id_monan` int(10) NOT NULL,
  `ten_monan` varchar(255) NOT NULL,
  `nguyenlieu` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`id_monan`, `ten_monan`, `nguyenlieu`) VALUES
(1, 'Gà chiên', 'Đùi gà góc tư, Dầu hạt cải nguyên chất Simply chai 1 lít, Muối tôm kiểu Tây Ninh Dh Foods hũ 110g');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_ncc` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web_site` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `ten_ncc`, `email`, `web_site`, `phone`, `ngay_tao`, `ngay_sua`, `status`) VALUES
(1, 'Toàn Phát', 'toanphat@gmail.com', 'https://tongkhogiavi.com.vn/duong-toan-phat/', '+84359873654', '2024-08-20 16:17:52', '0000-00-00 00:00:00', 0),
(2, 'Knorr Việt Nam', 'tuvankhachhang@unilever.com', 'https://www.knorr.com/vn/home.html', '+84-28-38236651', '2024-08-20 16:13:31', '0000-00-00 00:00:00', 0),
(3, 'Công Ty Simply', 'info-calofic@vn.wilmar-intl.com', 'https://www.calofic.com.vn/', '(+84 203) 3  84', '2023-08-20 15:15:00', '0000-00-00 00:00:00', 0),
(4, 'CHINSU', 'info@msc.masangroup.com', 'https://masanconsumer.com/', '+84 902 662 660', '2021-04-15 13:50:00', '0000-00-00 00:00:00', 0),
(5, 'Công ty Cổ Phần Dh Foods', 'export@dhfoods.com.vn', 'https://dhfoods.com.vn/', '028 3922 5940', '2024-08-20 15:49:54', '0000-00-00 00:00:00', 0),
(6, 'Coca cola', 'cocacola@gmail.com', 'https://www.coca-cola.com/vn/vi', '0384832442', '2024-08-20 16:38:19', '0000-00-00 00:00:00', 0),
(7, 'Công Ty Pepsi', 'pepsi@mgail.com', 'https://www.pepsi.com/', '0924892442', '2024-08-20 16:44:32', '0000-00-00 00:00:00', 0),
(8, 'Công ty Sting', 'StingBatNL@gmail.com', 'https://www.suntorypepsico.vn/product/index/sting', '0645454342', '2021-05-13 16:57:32', '0000-00-00 00:00:00', 0),
(9, 'Công ty 3 cô gái', ' thaicorp@tcivn.com', 'https://tcivn.com/vi/3ldc', ' 028 6296 0000', '2024-08-21 14:35:24', '0000-00-00 00:00:00', 0),
(10, 'Masan', 'Pr@msn.masangroup.com', 'https://www.masangroup.com/', '+84 28 6256 386', '2024-08-21 13:35:24', '0000-00-00 00:00:00', 0),
(11, 'Omachi', 'info@msc.masangroup.com', 'www.masanconsumer.com', '+84 902 662 660', '2024-08-21 14:36:52', '0000-00-00 00:00:00', 0),
(12, 'Công Ty PorkGenie', 'Porkgenieee@gmail.com', 'porkgenie.com', '0924832442', '2024-08-21 02:37:28', '0000-00-00 00:00:00', 0),
(13, 'Công ty cổ phần C.P', 'web-info@cp.com.vn', 'https://www.cp.com.vn/', ' 0251 3836 251', '2021-05-13 08:22:28', '0000-00-00 00:00:00', 0),
(14, 'Công ty cổ phần Fishcool', 'Fishcool108@gmail.com', 'fishcoolww.vn', '0983749856', '2024-08-21 21:10:41', '2024-08-21 21:11:38', 0),
(15, 'VegetableQV', '\r\nVegetableQV@gmail.com', 'Vegetable.com.vn', '0587628745', '2024-08-21 21:58:33', '2024-08-21 21:59:38', 0),
(16, 'Teppy Orange', 'Teppy@gmail.com', 'teppyww.vn.com', '0587398476', '2024-08-21 23:27:29', '2024-08-21 23:29:08', 0),
(17, 'C2 ', 'info@urcvn.com', 'https://urc.com.vn/en', '0568756234', '2024-08-21 23:38:05', '2024-08-21 23:38:55', 0),
(18, 'TH true Milk', 'THtrueMilk112@gmail.com', 'https://www.thmilk.vn/', '024.3573 9777', '2024-08-21 23:48:35', '2024-08-21 23:51:41', 0),
(19, 'Milo', 'Milo@gmail.com', 'https://www.nestlemilo.com.vn/', '0598578855', '2024-08-22 00:18:25', '2024-08-22 00:19:45', 0),
(20, 'Maggi', 'https://www.maggi.com.vn/', 'maggie@gmail.com', '0957836546', '2024-08-22 02:09:39', '2024-08-22 02:11:41', 0),
(21, 'seafoodQV', 'seafoodQV12@gmail.com', 'seafoodQV12.com.vn', '0686439826', '2024-08-22 02:50:15', '2024-08-22 02:51:31', 0),
(22, 'Aquafina', 'aquafinaVN@gmail.com', 'https://aquafinavietnam.com/', '0957487287', '2024-08-22 04:02:51', '2024-08-22 04:04:41', 0),
(23, 'Yomost', 'yomost@gmail.com', 'https://www.yomost.vn/', '0476689764', '2024-08-23 00:06:08', '2024-08-23 00:12:29', 0),
(24, 'Noodle Supplies', 'noodleSp101@gmail.com', 'https://gourmetfoods.vn/noodles', '0846511751', '2024-10-01 11:17:26', '2024-10-01 11:17:26', 0),
(25, 'Golden Noodles Co', 'geldenNoodles19@gmail.com', 'https://gourmetfoods.vn/noodles', '0596711735', '2024-10-01 11:17:26', '2024-10-01 11:17:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_nv` varchar(191) NOT NULL,
  `ten_dangnhap` varchar(191) NOT NULL,
  `mat_khau` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `id_loainv` int(20) NOT NULL,
  `id_quyen` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten_nv`, `ten_dangnhap`, `mat_khau`, `phone`, `hinh_anh`, `email`, `ngay_tao`, `ngay_sua`, `status`, `id_loainv`, `id_quyen`) VALUES
(1, 'Tạ Quốc Việt', 'van', 'Van@12345', '0333384094', 'z5916451210611_bc67c7471e041984e9abe4f572f6bb79.jpg', 'kim2117yen@gmail.com', '2024-09-10 11:29:46', '2024-09-10 11:29:46', 0, 2, 1),
(102, 'Lê Trung Hiếu', 'hiuhiu', 'Hiu&dj97', '0487511365', 'nhanvienkho.jpg', 'hiuhiu12@gmail.com', '2024-09-26 12:42:31', '2024-09-26 12:42:31', 0, 1, 2),
(103, 'Phạm Thị Ly', 'ThiLy', 'Lyli%1091', '0586711092', 'nhanvienbanhang.jpg', 'lily12@gmail.com', '2024-09-26 12:44:09', '2024-09-26 12:44:09', 1, 1, 1),
(11189, 'Phạm Đan Thi', 'danthi', 'danThi@9375', '0835611146', 'nvbanhang.jpg', 'thi82@gmail.com', '2024-09-28 05:51:29', '2024-09-28 05:51:29', 0, 1, 11),
(333333, 'Tạ Như Ý', 'NhuY', 'Hong2345@', '0333384094', 'nvbanhang.jpg', 'ntkimyen2711@gmail.com', '2024-08-30 03:51:31', '2024-08-30 03:51:31', 0, 1, 1),
(3333339, 'Nguyễn Kim Ngân', 'ngan', 'Ngan@1234', '0333384094', 'nvtv.jpeg', 'ntkimyen2711@gmail.com', '2024-09-10 12:16:01', '2024-09-10 12:16:01', 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nv` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `nguoi_nhan` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `ghichu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `id_nv`, `tong_tien`, `ngay_tao`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`) VALUES
(11, 333333, 70000, '2024-09-25 10:18:48', 'Công ty Milk tea-CS1', 957221978, '12 Lê Quan Định, p.14, Gò Vấp, TP.HCM', 'Mua thêm 2 sản phẩm sữa'),
(13, 333333, 195000, '2024-09-25 15:51:38', 'Công ty cá mồi 2 cô gái', 597435412, '129 Thủ Đức, TP.HCM', 'Mua thêm 5 hộp cá mồi'),
(14, 1, 622000, '2024-09-27 12:53:55', 'Chi nhánh 3-Cửa hàng sữa milkly', 475652219, '23/109 Nguyễn Văn Tầng, quận 8, TP.HCM', 'Mua 2 thùng sữa Yomost'),
(15, 1, 237000, '2024-09-27 13:23:09', 'Chi nhánh A-Cá Anny-TP.HCM', 363422846, '142 Lê Đại Hành, p.19, q.2, TP.HCM', 'đặt 1 1500g cá cơm, giao vào ngày 12/10');

-- --------------------------------------------------------

--
-- Table structure for table `phieutra`
--

CREATE TABLE `phieutra` (
  `id` int(10) NOT NULL,
  `id_nhanvien` int(10) UNSIGNED NOT NULL,
  `ngay_tra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sdt` int(11) NOT NULL,
  `ghi_chu` varchar(500) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `dia_chi` varchar(250) NOT NULL,
  `nguoi_nhan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieutra`
--

INSERT INTO `phieutra` (`id`, `id_nhanvien`, `ngay_tra`, `sdt`, `ghi_chu`, `tong_tien`, `dia_chi`, `nguoi_nhan`) VALUES
(2400, 3333339, '2024-09-24 15:27:56', 865457654, 'Hàng bị lỗi', 100000, '234 Lê Văn Lương, quận 12, TP.HCM', 'Công Ty TNB mình gói các loại'),
(2401, 333333, '2024-09-25 15:50:30', 597435412, 'Trả 4 hộp cá mồi hết hạn', 156000, '129 Thủ Đức, TP.HCM', 'Công ty cá mồi 2 cô gái'),
(2402, 333333, '2024-09-25 16:06:40', 586388812, '2 bịch đường bị rách', 32000, '22 Lê Đại Hành, quận 1, TP.HCM', 'Cơ sơ 3, Đường cát trắng'),
(2403, 333333, '2024-09-25 17:14:59', 586388812, '6 bịch đường bị rách', 96000, '22 Lê Đại Hành, quận 1, TP.HCM', 'Cơ sơ 3, Đường cát trắng'),
(2404, 333333, '2024-09-26 12:04:43', 486111873, '2 hộp nước ép bị hỏng khi nhận hàng', 116000, '182 Lê Đại Hành, p.2, Quận 8, TP.HCM', 'Cơ sở 2-Thực phẩm sạch FG'),
(2405, 333333, '2024-09-26 12:05:00', 947824987, '2 hộp nước ép bị hỏng khi nhận hàng', 116000, '182 Lê Đại Hành, p.2, Quận 8, TP.HCM', 'Cơ sở 2-Thực phẩm sạch FG'),
(2406, 333333, '2024-09-26 12:09:04', 947824987, '2 hộp nước ép bị hỏng khi nhận hàng', 116000, '182 Lê Đại Hành, p.2, Quận 8, TP.HCM', 'Cơ sở 2-Thực phẩm sạch FG'),
(2407, 333333, '2024-09-26 12:18:12', 475631138, '5 lon nước ngọt bị biến dạng khi nhận hàng', 56000, '12 Nguyễn Chí Vỹ, quận 2, TPHCM', 'Cơ sở 2-Nước ngọt TN');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_quyen` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`id`, `ten_quyen`) VALUES
(1, 'Admin'),
(2, 'Quản lý kho'),
(3, 'Quản lý tư vấn'),
(8, 'quản lý thống kê'),
(11, 'Quản lý bán hàng');

-- --------------------------------------------------------

--
-- Table structure for table `quyendahmuc`
--

CREATE TABLE `quyendahmuc` (
  `id_quyen` int(10) UNSIGNED NOT NULL,
  `id_danhmuc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyendahmuc`
--

INSERT INTO `quyendahmuc` (`id_quyen`, `id_danhmuc`) VALUES
(6, 1),
(6, 2),
(6, 7),
(6, 8),
(7, 1),
(7, 2),
(7, 5),
(4, 1),
(4, 2),
(4, 8),
(4, 9),
(4, 10),
(4, 12),
(9, 6),
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 11),
(1, 12),
(1, 13),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 12),
(8, 1),
(8, 2),
(8, 5),
(8, 7),
(8, 11),
(8, 12),
(3, 1),
(3, 5),
(3, 7),
(3, 8),
(10, 1),
(10, 5),
(10, 7),
(10, 8),
(10, 11),
(10, 12),
(11, 1),
(11, 5),
(11, 7),
(11, 8),
(11, 11),
(11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_sp` varchar(191) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `gia_goc` int(11) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `noi_dung` varchar(500) NOT NULL,
  `id_the_loai` int(10) UNSIGNED NOT NULL,
  `id_nha_cc` int(10) UNSIGNED NOT NULL,
  `so_luong` tinyint(4) NOT NULL,
  `sl_da_ban` tinyint(4) NOT NULL,
  `khoi_luong` varchar(50) NOT NULL,
  `xuat_xu` varchar(50) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_sp`, `don_gia`, `gia_goc`, `hinh_anh`, `noi_dung`, `id_the_loai`, `id_nha_cc`, `so_luong`, `sl_da_ban`, `khoi_luong`, `xuat_xu`, `ngay_tao`, `ngay_sua`, `trangthai`) VALUES
(1001, 'Dầu hạt cải nguyên chất Simply chai 1 lít', 68000, 79000, 'anhdauan.jpg', '<p>Là loại dầu ăn nguyên chất 100%, sản xuất từ nguồn nguyên liệu nhập khẩu cao cấp, giàu chất béo không bão hoà. Các thành phần có trong dầu hạt cải nguyên chất Simply chai 1 lít của thương hiệu</p>', 2, 3, 21, 9, '1 lít', 'Việt Nam', '2024-08-20 03:25:36', '0000-00-00 00:00:00', 0),
(1002, 'Dầu đậu nành nguyên chất Simply can 5 lít', 295000, 320000, 'dau-dau-nanh-nguyen-chat-simply-can-5-lit-202308081107028399.jpg', 'Dầu ăn của thương hiệu dầu ăn Simply đều được làm từ những nguyên liệu được chọn lọc kỹ càng. Dầu đậu nành Simply nguyên chất can 5 lít bổ sung Omega 3, 6, 9 có lợi cho sức khỏe và sự phát triển', 2, 3, 17, 3, '5 lít', 'Việt Nam', '2024-08-20 03:43:30', '2024-08-20 03:43:30', 0),
(1003, 'Tương ớt Chinsu vị wasabi chai 250g', 21000, 22000, 'tuong-ot-chinsu-wasabi-chai-250g-202306170804079977.jpg', 'Tương ớt Chinsu wasabi chai 250g với hương vị nồng cay trứ danh từ wasabi Nhật Bản, mang lại vị đậm đà, hấp dẫn cho các món ăn. Tương ớt Chinsu là một trong những nhãn hiệu tương ớt được ưa chuộng', 2, 4, 17, 3, '250g', 'Việt Nam', '2024-08-20 03:52:12', '2024-08-20 03:58:06', 0),
(1004, 'Muối tôm kiểu Tây Ninh Dh Foods hũ 110g', 15000, 18500, 'muoi-tom-kieu-tay-ninh-dh-foods-hu-120g-202405200759424464.jpg', 'Muối Dh Foods là được xem là thức chấm tuyệt vời cho các món trái cây, rau củ luộc, hấp... trong mỗi gia đình. Muối tôm kiểu Tây Ninh Dh Foods hũ 110g là sự kết hợp của muối mặn nồng, tôm phơi khô cùng với những quả ớt chín mọng, không phẩm màu và không chất bảo quản nhân tạo.', 2, 5, 47, 3, '110g', 'Việt Nam', '2024-08-20 04:06:00', '2024-08-20 04:08:39', 0),
(1005, 'Hạt nêm Knorr thịt thăn, xương ống, tủy gói 900g', 75000, 86000, 'hat-nem-thit-than-xuong-ong-tuy-knorr-goi-900g-202203302002567432.jpg', 'Hạt nêm Knorr là thương hiệu chuyên cung cấp hạt nêm nổi tiếng toàn thế giới. Hạt nêm thịt thăn, xương ống, tủy Knorr gói 900g sản xuất từ bột thịt thăn, chiết xuất xương ống và tủy từ nguồn thịt heo tươi sống được hầm trong nhiều giờ liền mang đến bữa ăn ngọt thanh, tròn vị.', 2, 2, 47, 10, '900g', 'Việt Nam', '2024-08-20 04:15:17', '2024-08-20 04:18:08', 0),
(1006, 'Đường kính trắng Toàn Phát gói 500g', 16000, 17500, 'duong-kinh-trang-toan-phat-goi-500g-202003171027092922.jpg', 'Với chiết xuất từ mía tốt cho sức khỏe, sản phẩm đường kính trắng Toàn Phát gói 500g có hạt đường nhỏ màu trắng tinh khiết, không chứa chất độc hại đảm bảo an toàn sức khỏe cho người sử dụng, giúp chế biến nhiều món ăn, thức uống thơm ngon, hấp dẫn\r\n', 2, 1, 86, 8, '500g', 'Việt Nam', '2024-08-20 04:27:55', '2024-08-20 04:30:08', 0),
(1007, 'Nước ngọt Coca Cola Zero lon 320ml', 11200, 12000, 'nuoc-ngot-coca-cola-zero-320ml-202201131326507695.jpg', ' Nước ngọt nổi tiếng thế giới được ưa chuộng tại nhiều nhiều quốc gia. Nước ngọt Coca Cola Zero lon 320ml chính hãng nước ngọt Coca Cola cho cơ thể cảm giác nhẹ nhàng, ăn ngon hơn, không đường không calo phù hợp cho những ai yêu thích nước ngọt nhưng vẫn muốn giữ thói quen ăn uống lành mạnh', 16, 6, 93, 22, '320ml', 'Mỹ', '2024-08-20 04:38:41', '0000-00-00 00:00:00', 0),
(1008, '6 lon nước ngọt Pepsi Cola 320ml/lon', 47000, 61000, '6-lon-nuoc-ngot-pepsi-cola-320ml-202405140913350279.jpg', ' Từ thương hiệu nước ngọt có gas nổi tiếng toàn cầu - nước ngọt Pepsi - với mùi vị thơm ngon với hỗn hợp hương tự nhiên cùng chất tạo ngọt tổng hợp, giúp xua tan cơn khát và cảm giác mệt mỏi.  6 lon nước ngọt Pepsi Cola 320ml bổ sung năng lượng làm việc mỗi ngày', 16, 7, 112, 15, '330ml', 'Việt Nam', '2024-08-20 04:50:28', '0000-00-00 00:00:00', 0),
(1009, 'Nước tăng lực Sting Sleek hương dâu 320ml', 11400, 12000, 'nuoc-tang-luc-sting-sleek-huong-dau-320ml-202111061723498584.jpg', ' Nước tăng lực Sting với mùi vị thơm ngon, sảng khoái, cùng hương dâu dễ chịu. Sting giúp cơ thể bù đắp nước, bổ sung năng lượng, vitamin C và E, giúp xua tan cơn khát và cảm giác mệt mỏi cùng dâu cho nhẹ nhàng và dễ chịu. Cam kết chính hãng, chất lượng và an toàn\r\n', 16, 8, 97, 3, '330ml', 'Việt Nam', '2024-08-20 04:56:56', '0000-00-00 00:00:00', 0),
(1010, 'Nước tăng lực Sting Gold 320ml/lon', 11000, 11500, 'nuoc-tang-luc-sting-vang-lon-cao-330ml-1511201815591.jpg', ' Nước tăng lực Sting với thành phần tự nhiên kết hợp với hương vị nhân sâm tạo nên sự kết hợp độc đáo với mùi vị thơm ngon, sảng khoái. Sản phẩm giúp cơ thể bù đắp nước, bổ sung năng lượng, vitamin C và E, giúp xua tan cơn khát và cảm giác mệt mỏi, cho bạn cảm giác cuộn trào hứng khởi', 16, 8, 113, 7, '320ml', 'Việt Nam', '2024-08-20 05:04:43', '0000-00-00 00:00:00', 0),
(1011, 'Cá hộp saba Nhật xốt cà 3 Cô Gái hộp 300g', 39000, 41000, 'ca-saba-nhat-xot-ca-3-co-gai-hop-300g-202005051102404629.jpg', 'Cá hộp tiện lợi, thơm ngon với hương vị đậm đà cùng nước sốt cà hoàn hảo. Cá saba Nhật xốt cà 3 Cô Gái hộp 300g có thể dùng để ăn liền hoặc chế biến thành các món ăn tuỳ ý. Không nấu trực tiếp khi còn trong hộp. Cá hộp ba cô gái đem đến cho gia đình bạn những món ăn ngon lành và bổ dưỡng.', 3, 9, 79, 9, '300g', 'Thái Lan', '2024-08-21 02:36:09', '2024-08-21 02:38:35', 0),
(1012, 'Cá hộp trích sốt cà Sea Crown hộp 155g', 16800, 17000, 'ca-trich-sot-ca-sea-crown-hop-155g-201905211926512185.jpg', 'Cá trích sốt cà Sea Crown hộp 155g được chế biến từ những con cá trích chọn lọc tươi ngon nhất, kết hợp cùng sốt cà chua và những gia vị tuyệt vời khác tạo ra món ăn đậm đà, khó cưỡng. Rất phù hợp để chế biến món ăn trong gia đình hoặc để đi du lịch hoặc dã ngoại.', 3, 9, 75, 5, '155g (khối lượng cái 93g)', 'Thái Lan', '2024-08-21 02:42:31', '2024-08-21 02:44:48', 0),
(1013, 'Thịt heo viên Heo Cao Bồi ăn liền vị xốt cà Masan 200g', 34500, 35000, 'thit-heo-vien-heo-cao-boi-an-lien-vi-xot-ca-masan-hop-200g-202110231632587327.jpg', 'Thịt heo hộp thơm ngon với hương vị khó cưỡng từ thịt thật được vo viên và tẩm ướp xốt cà. Thịt heo viên Heo Cao Bồi ăn liền vị xốt cà Masan hộp 200g vô cùng tiện lợi, chỉ cần hâm nóng lên là thưởng thức ngay. Thịt heo hộp Masan chất lượng, an toàn và dinh dưỡng', 3, 10, 75, 5, '200g', 'New Zealand', '2024-08-21 02:53:16', '2024-08-21 02:58:18', 0),
(1014, 'Cá Hộp ngừ xốt cà ri Tuna Việt Nam hộp 155g', 17000, 22000, 'ca-ngu-xot-ca-ri-tuna-viet-nam-hop-155g-202110301536155644.jpg', 'Cá hộp Tuna Việt Nam thơm ngon, thịt cá hồi chắc, ngọt thịt. Cá ngừ xốt cà ri Tuna Việt Nam hộp 155g với loại xốt cà ri chất lượng với công thức pha chế riêng mang đến hương vị đậm đà. Cá hộp rất tiện lợi, sử dụng trực tiếp với cơm, cháo,....hoặc chế biến thành nhiều món hấp dẫn khác', 3, 9, 51, 9, '155g', 'Thái Lan', '2024-08-21 03:05:15', '2024-08-21 03:07:30', 0),
(1015, 'Mì trộn Omachi xốt tôm phô mai trứng muối hộp 105g', 16000, 16800, 'mi-tron-omachi-xot-tom-pho-mai-trung-muoi-hop-105g-202210290916471340.jpg', ' Sợi mì vàng dai ngon hòa quyện trong nước sốt mì Omachi tôm phô mai trứng muối đậm đà, thơm lừng ngất ngây và nhiều dinh dưỡng tạo ra siêu phẩm mì với sự kết hợp hương vị hài hòa, độc đáo. Mì trộn Omachi xốt tôm phô mai trứng muối hộp 105g tiện lợi, thơm ngon hấp dẫn', 9, 11, 93, 12, '105g', 'Việt Nam', '2024-08-21 03:27:15', '0000-00-00 00:00:00', 0),
(1016, 'Mì khoai tây Omachi tôm chua cay Thái tô 91g', 15000, 15200, 'mi-khoai-tay-omachi-tom-chua-cay-thai-to-91g-202209200958108399.jpg', ' Mì ăn liền dạng tô tiện lợi đến từ thương hiệu mì Omachi uy tín. Mì khoai tây Omachi tôm chua cay Thái 91g với nước cốt đậm đà, mì dai hơn, dinh dưỡng hơn với trứng và khoai tây, hương vị tôm chua cay Thái hấp dẫn mang đến cho bạn những bữa ăn chất lượng, tiết kiệm, thơm ngon\r\n', 9, 11, 58, 2, '91g', 'Việt Nam', '2024-08-21 03:38:40', '0000-00-00 00:00:00', 0),
(1017, 'Thịt heo đùi Meat Master 400g', 53500, 59500, 'thit-dui-heo-meat-master-400g-202303210853565559.jpg', 'Thịt đùi là phần thịt được lóc ra từ bộ phận đùi con heo, gồm có 3 lớp - da, mỡ và thịt được phân tác rõ ràng, trong đó lớp thịt nạc dày hơn. Bạn có thể dùng thịt đùi để làm món nướng, kho, ram hoặc xào đều ngon.', 8, 12, 57, 3, '400g', 'Việt Nam', '2024-08-21 03:50:54', '2024-08-21 03:55:29', 0),
(1018, 'Thịt heo Ba rọi Meat Master 400g\r\n\r\n', 72000, 80000, 'ba-roi-heo-meat-master-400g-202303210839210459.jpg', 'Thịt ba chỉ, thịt ba rọi hay thịt nây là phần thịt mỡ lẫn nạc không xương từ bụng của con heo. Sở dĩ có tên là ba chỉ vì miếng thịt gồm các lớp thịt, mỡ, thịt, mỡ xen lẫn xếp lớp lên với nhau.', 8, 12, 66, 4, '400g', 'Việt Nam', '2024-08-21 03:59:25', '2024-08-21 04:02:38', 0),
(1019, 'Đùi cánh gà tươi C.P 500g (6-8 đùi)', 45000, 47500, 'dui-canh-ga-tuoi-khay-500g-6-8-dui-202111261956090593.jpg', 'Đùi cánh gà hay còn gọi là tỏi cánh gà, là bộ phận tiếp giáp với phần thân và cánh giữa của con gà. Đây là phần nhiều thịt nhất trên cánh gà được nhiều người ưa thích bởi thịt này rất ngon, ăn không ngán. ', 8, 13, 93, 7, '500g', 'Việt Nam', '2024-08-21 20:22:50', '2024-08-21 20:26:26', 0),
(1020, 'Chân gà tươi', 26400, 0, 'chan-ga-tuoi-202403011655289144.jpg', 'Chân gà có các mô liên kết và sụn có chứa collagen, axit amin và một số chất tạo gelatin, những chất giúp cải thiện sức khỏe của nướu răng rất tốt.', 8, 13, 50, 0, '300g/ hộp', 'Việt Nam', '2024-08-21 20:31:51', '2024-08-21 20:47:37', 0),
(1021, 'Đùi gà góc tư', 29100, 0, 'dui-ga-goc-tu-202403011654083801.jpg', 'Đùi gà góc tư tươi là một trong những mặt hàng thịt tươi đã qua sơ chế sạch sẽ và đóng gói theo tiêu chuẩn an toàn vệ sinh thực phẩm. Gà này không chỉ được xem là nguyên liệu thông dụng cho các món ăn hấp dẫn và là nguồn dinh dưỡng tốt cho sức khỏe.\r\n\r\n', 8, 13, 87, 13, '300g', 'Việt Nam', '2024-08-21 20:56:08', '2024-08-21 21:00:20', 0),
(1022, 'Cá cơm biển 500g', 79000, 89000, '-202407081602340792.jpg', 'Cá cơm biển là loại cá có tự nhiên được coi như là một loại đặc sản vùng này bởi cá cơm ngon ngọt và đậm đà.Cá được đánh lưới lên, rồi được hong khô dưới ánh nắng mặt trời ngay sau khi đánh bắt, đến tối gom lại và sáng lại lấy ra hong nắng. Lâu lâu lại đảo cá để cá được khô đều. ', 4, 14, 73, 0, '500g', 'Việt Nam', '2024-08-21 21:12:03', '2024-08-21 21:16:41', 0),
(1023, 'Hành lá', 2700, 3000, '-202408010852513668.jpg', 'Hành lá là loại thực phẩm chứa nhiều chất dinh dưỡng có lợi cho sức khỏe. Đặc biệt là hợp chất allicin, có khả năng ngăn ngừa và làm chậm quá trình phát triển bệnh ung thư.', 5, 15, 99, 1, '50g', 'Việt Nam', '2024-08-21 22:00:02', '2024-08-21 22:03:10', 0),
(1024, 'Rau mồng tơi 400g/1 bó', 10000, 0, 'rau-mong-toi-tui-500g-202009292357355810.jpg', 'Rau mồng tơi tính hàn, vị chua, không độc, hỗ trợ lợi tiểu, giải độc, làm đẹp da, trị rôm sảy, mụn nhọt, hỗ trợ chứng thiếu máu, say nắng nóng. Nước cốt từ rau mồng tơi có thể làm mau lành vết bỏng, hầm mồng tơi với chân giò tốt cho người bị đau nhức xương khớp.', 5, 15, 114, 6, '500g/bó', 'Việt Nam', '2024-08-21 22:05:48', '2024-08-21 22:09:30', 0),
(1025, 'Cà rốt trái từ 150g trở lên', 15500, 0, 'ca-rot-202312081116076334.jpg', 'Cà rốt là một loại rau củ tốt cho sức khỏe, với độ giòn, vị ngon và chứa rất nhiều beta carotene, chất xơ, vitamin K1, kali cũng như chất chống oxy hóa. Ăn cà rốt rất thích hợp cho việc giảm cân, giúp giảm cholesterol, cải thiện sức khỏe mắt, thậm chí là giảm nguy cơ ung thư.', 5, 15, 46, 4, '500g', 'Việt Nam', '2024-08-21 22:13:09', '2024-08-21 22:17:31', 0),
(1026, 'Hành tây củ từ 100g trở lên', 17500, 18000, 'hanh-tay-202312261433144727.jpg', 'Hành tây có một số lợi ích sức khỏe, chủ yếu là do hàm lượng chất chống oxy hóa cao và các hợp chất chứa lưu huỳnh. Ăn hành tây có tác dụng kháng viêm, đồng thời giảm nguy cơ ung thư, hạ lượng đường trong máu và cải thiện sức khỏe của xương.', 5, 15, 36, 4, '500g', 'Việt Nam', '2024-08-21 22:20:51', '2024-08-21 22:24:22', 0),
(1027, 'Bí đỏ hồ lô trái từ 700g trở lên', 10000, 0, 'bi-do-ho-lo-202312271411134968.jpg', 'Bí đỏ hồ lô hay còn gọi là bí đỏ hạt đậu, được biết đến là giống bí có ruột bên trong rất đặc cùng với đặc điểm ít hạt, ăn khá dẻo và ngọt. Hơn nữa, bí hồ lô còn có chứa dồi dào các chất dinh dưỡng và mang lại nhiều những lợi ích cho sức khỏe.', 5, 15, 70, 0, '700g', 'Việt Nam', '2024-08-21 23:07:21', '2024-08-21 23:10:51', 0),
(1028, 'Nước ngọt Sprite hương chanh lon 320ml', 10000, 0, 'nuoc-ngot-sprite-huong-chanh-lon-320ml-20.jpg', 'Nước ngọt Sprite hương chanh lon 320ml vị chanh tươi mát cùng, vị ga bùng nổ sảng khoái, giúp bạn đập tan cơn khát, kích thích vị giác giúp bạn ăn ngon miệng hơn.', 16, 8, 30, 0, '320ml', 'Việt Nam', '2024-09-30 13:49:31', '2024-09-30 13:49:31', 0),
(1029, 'Nước ngọt 7 Up vị chanh lon 320ml', 10800, 11000, 'nuoc-ngot-7-up-lon-330ml-202312252102017018.jpg', 'Nước ngọt 7 Up hương chanh lon 320ml có vị ngọt vừa phải và hương vị gas the mát, giúp bạn xua tan nhanh chóng cơn khát, giảm cảm giác ngấy', 16, 6, 18, 2, '320', '7 Up (Mỹ)', '2024-09-30 14:00:08', '2024-09-30 14:00:08', 0),
(1030, 'Nước ngọt Pepsi không calo lon 320ml', 11200, 12000, 'nuoc-ngot-pepsi-khong-calo-lon-320ml-202405140927583779.jpg', 'Nước ngọt Pepsi không calo lon 320ml với lượng gas lớn sẽ giúp bạn xua tan mọi cảm giác mệt mỏi, căng thẳng, sản phẩm không calo lành mạnh, tốt cho sức khỏe', 16, 6, 20, 0, '320ml', 'Pepsi (Mỹ)', '2024-09-30 14:06:32', '2024-09-30 14:06:32', 0),
(1031, 'Nước ngọt Fanta soda kem trái cây lon 320ml', 10000, 0, 'nuoc-ngot-fanta-huong-soda-kem-trai-cay-lon-320ml-202212181657498794.jpg', ' Nước ngọt Fanta hương trái cây lon 320ml thơm ngon vị trái cây độc đáo giúp xua tan cơn khát và kích thích vị giác.', 16, 6, 20, 0, '320ml', 'Việt Nam', '2024-09-30 14:13:09', '2024-09-30 14:13:09', 0),
(1032, 'Nước ngọt Mirinda hương cam lon 320ml', 10800, 11000, 'nuoc-ngot-mirinda-huong-cam-lon-320ml-202312252142544474.jpg', 'Nước ngọt Mirinda cam lon với hương vị cam đặc trưng, không chỉ giải khát, mà còn bổ sung thêm vitamin C giúp lấy lại năng lượng ', 16, 7, 30, 0, '320ml', 'Việt Nam', '2024-09-30 14:23:57', '2024-09-30 14:23:57', 0),
(1033, 'Thùng 48 hộp sữa tươi tiệt trùng Vinamilk 110ml', 235000, 240000, 'thung-48-hop-sua-tuoi-co-duong-vinamilk-100-sua-tuoi-110ml-202404111440036216.jpg', 'Sữa tươi Vinamilk là thương hiệu được tin dùng hàng đầu với chất lượng tuyệt vời. Thùng 48 hộp sữa tươi tiệt trùng có đường Vinamilk 100% Sữa Tươi 110ml đóng thùng tiết kiệm, tiện dùng lâu dài', 6, 18, 25, 0, '110ml/hộp', 'Việt Nam', '2024-09-30 15:02:52', '2024-09-30 15:02:52', 0),
(1034, 'Bột ngọt hạt lớn Ajinomoto gói 454g', 36000, 0, 'bot-ngot-ajinomoto-goi-454g-202006172147080428.jpg', 'Bột ngọt hạt lớn Ajinomoto 454g dùng trong chế biến món ăn gia đình, quán ăn,... giúp món ăn thêm ngon, hấp dẫn.', 2, 11, 40, 0, '454g', 'Việt Nam', '2024-09-30 15:13:55', '2024-09-30 15:13:55', 0),
(1035, 'Nước ép trái cây Jele L-carnitine vị vải 150g', 16800, 17000, 'nuoc-ep-trai-cay-jele-l-carnitine-vi-vai-150g-202305270927168903.jpg', 'Sản phẩm mang lại cảm giác ngon và lạ miệng vì có thạch rau câu trộn lẫn nước trái cây, hứa hàm lượng Vitamin C cao giúp tăng cường hệ miễn dịch, bảo vệ cơ thể chống lại nhiễm trùng', 7, 19, 20, 0, '150g', 'Thái Lan', '2024-09-30 15:27:28', '2024-09-30 15:27:28', 0),
(1046, 'Bắp cải trắng bắp từ 700g trở lên', 7000, 9500, 'bap-cai-trang-bap-tu-700g-tro-len-202404171102288487.jpg', 'Bắp cải có hình tròn dẹp, lá màu trắng xanh đặc trưng và các lá được ôm chặt với nhau. Bắp cải có vị ngọt tự nhiên, giàu chất sơ, ít chất béo nên rất nhiều người sử dụng.', 5, 15, 98, 2, '700g', 'Việt Nam', '2024-08-22 22:59:05', '2024-08-22 23:05:33', 0),
(1047, 'Nước ép trái cây táo Vfresh 1 lít\r\n\r\n', 49500, 50000, 'nuoc-ep-tao-vfresh-1-lit-202209282308183084.jpg', 'Sản phẩm nước ép trái cây từ thương hiệu nước ép Vfresh được làm từ nguyên liệu tự nhiên tươi ngon có hương vị ngọt dịu, thơm mát từ những trái táo tươi ngon, sản phẩm chứa nhiều khoáng chất, dinh dưỡng, chất chống oxy hóa', 7, 16, 29, 1, '1 lít', 'Việt Nam', '2024-09-30 15:36:42', '2024-09-30 15:36:42', 0),
(1048, 'Nước ép trái cây lựu Juss 1 lít', 58000, 60000, 'nuoc-ep-luu-juss-1-lit-202102222143528516.jpg', 'Nước ép lựu Juss lựu đỏ 1 lít từ quả lựu tươi ngon chứa nhiều vitamin và dinh dưỡng giúp giải khát nhanh chóng, cung cấp năng lượng cho cơ thể khỏe mạnh, mang lại hiệu quả làm đẹp da rất tốt', 7, 16, 25, 0, '1 lít', 'Thổ Nhĩ Kỳ', '2024-09-30 15:42:54', '2024-09-30 15:42:54', 0),
(1049, 'Nước trái cây trà đào, hạt chia Fuze Tea 1 lít', 18000, 20000, 'tra-dao-va-hat-chia-fuze-tea-chai-1-lit-202211261120594163.jpg', 'Nước trái cây thật và hạt chia chính hãng thương hiệu trà FuzeTea chất lượng. Trà đào và hạt chia Fuze Tea 1 lít có hương vị thơm ngon hấp dẫn, bùi bùi thơm thơm', 7, 16, 38, 0, '1 lít', 'Việt Nam', '2024-09-30 15:50:06', '2024-09-30 15:50:06', 0),
(1050, 'Trà trái cây bí đao Wonderfarm chai 440ml', 10000, 0, 'tra-bi-dao-wonderfarm-chai-440ml-clone-202407171914010554.jpg', 'Trà bí đao Wonderfarm chai 440ml cung cấp nhiều vitamin như Caroten, B1, B2, B3, C và các vitamin khác. Hương thơm nhẹ nhàng của trà cũng làm kích thích vị giác người dùng, có tác dụng thanh lọc cơ thể, mát gan', 7, 18, 20, 0, '440ml', 'Việt Nam', '2024-09-30 16:51:10', '2024-09-30 16:51:10', 0),
(1051, 'Trà trái cây mật ong Boncha vị tắc 450ml', 10500, 11000, 'tra-mat-ong-boncha-vi-tac-chai-450ml-202401271405555240.jpg', 'Trà mật ong Boncha vị tắc chai 450ml chính hãng trà Boncha thơm ngon, giải khát, cho năng lượng đầy hứng khởi.', 7, 17, 30, 0, '450ml', 'Việt Nam', '2024-09-30 17:00:39', '2024-09-30 17:00:39', 0),
(1052, 'Thịt heo xay Meat Master 400g', 55000, 61000, 'thit-heo-xay-meat-master-400g-202303210855348281.jpg', 'Thịt heo xay Meat Master là sự kết hợp của thịt nạc và mỡ tươi sạch tạo sự cân bằng trong hương vị cũng như đảm bảo giá trị dinh dưỡng cho món ăn. ', 8, 12, 25, 0, '400g', 'Việt Nam', '2024-09-30 17:19:43', '2024-09-30 17:19:43', 0),
(1053, 'Ba rọi heo rút sườn C.P 500g (1-2 miếng)', 116000, 129000, 'ba-roi-heo-rut-suon-cp-khay-500g-202111262057566174.jpg', 'Ba rọi heo rút sườn C.P là phần thịt đặc trưng bao gồm phần thịt ba rọi và sườn non đã được lấy xương. Ba rọi heo được đóng khay tiện lợi, sạch sẽ', 8, 12, 30, 0, '500g', 'Việt Nam', '2024-09-30 17:29:24', '2024-09-30 17:29:24', 0),
(1054, 'Thị gà dai nguyên con nhập khẩu 1.3kg', 118950, 130000, 'ga-dai-nhap-khau-202402271106417906.jpg', 'Gà dai có thịt dai, giòn, ăn chắc thịt giống gà ta nên có thể chế biến được nhiều món từ nấu phở, xôi gà đến cơm suất hay gà BQQ', 8, 12, 30, 0, '1.3kg', 'Hàn quốc', '2024-09-30 17:35:27', '2024-09-30 17:35:27', 0),
(1055, 'Thịt heo sườn non C.P 500g (4-6 miếng)', 117000, 124500, 'suon-non-heo-cp-500g-5-7-mieng-202401301654404985.jpg', 'Sườn non heo chất lượng, tươi ngon, được đóng khay tiện lợi, vệ sinh sạch sẽ. Đóng khay 500g từ 4-6 miếng. Sườn non heo được đảm bảo nguồn gốc xuất xứ rõ ràng.', 8, 12, 30, 0, '500g', 'Việt Nam', '2024-09-30 17:42:03', '2024-09-30 17:42:03', 0),
(1056, 'Râu mực nhập khẩu 500g\r\n\r\n', 80000, 95000, 'rau-muc-nhap-khau-202405072312593020.jpg', 'Tác dụng của râu mực đối với sức khỏe. Giúp cơ thể hấp thụ và sử dụng sắt tối ưu. Giúp hỗ trợ và duy trì sức khỏe của làn da. Giúp xương chắc khỏe', 4, 21, 30, 0, '500g', 'Trung Quốc', '2024-09-30 17:51:20', '2024-09-30 17:51:20', 0),
(1057, 'Cá basa phi lê 250g', 29750, 32000, 'ca-basa-phi-le-202405091054513197.jpg', 'Cá basa phi lê tươi ngon, thịt mềm, ngọt và béo. Cá được phi lê, loại bỏ da, thành miếng lớn, xếp trong khay ', 4, 21, 40, 0, '250g', 'Việt Nam', '2024-09-30 17:58:15', '2024-09-30 17:58:15', 0),
(1058, 'Cá diêu hồng làm sạch 400g\r\n\r\n', 30878, 35600, 'ca-dieu-hong-lam-sach-202405072353183502.jpg', 'Cá diêu hồng tươi ngon, được đóng khay nguyên con từ 300g - 450g, thịt cá dai ngon, chắc thịt, ngọt.', 4, 21, 40, 0, '400g', 'Việt Nam', '2024-09-30 18:04:11', '2024-09-30 18:04:11', 0),
(1059, 'Cá hú làm sạch nguyên con 1kg', 139000, 149000, 'ca-hu-nguyen-con-lam-sach-08kg-11kg-202303311334430882.jpg', 'Cá hú đã được làm sạch sẵn, nguyên con, đóng trong túi hút chân không. Vì vậy, khi mua cá về bận chỉ cần rửa sạch lại với nước muối, dúng nước ấm cạo lớp nhớt cho sạch', 4, 21, 30, 0, '1kg', 'Việt Nam', '2024-09-30 18:20:07', '2024-09-30 18:20:07', 0),
(1060, 'Cá bóp cắt khúc 500g (4 - 5 khúc)', 179000, 185000, 'ca-bop-cat-khuc-500g-4-5-khuc-202405271520029107.jpg', 'cá bớp lành tính, có vị ngọt, tính bình, bổ thận, ích khi, hóa đờm, thông kinh lạc. Tốt cho người có tì vị yếu, rối loạn tiêu hóa, ăn uống kém,...', 4, 21, 40, 0, '500g', 'Việt Nam', '2024-09-30 18:26:53', '2024-09-30 18:26:53', 0),
(1061, 'Nước tinh khiết Jovita 500ml', 4800, 6000, 'nuoc-tinh-khiet-jovita-500ml-202307291804389324.jpg', 'Nước suối đóng chai tinh khiết trong sạch, được xử lý bằng quy trình hiện đại của thương hiệu nước suối Jovita với màng lọc RO, thanh trùng Ozone.', 1, 22, 100, 0, '500ml', 'Việt Nam', '2024-09-30 18:32:57', '2024-09-30 18:32:57', 0),
(1062, 'Mì ba Miền gà sợi phở hành phi gói 65g', 3500, 5000, 'mi-3-mien-ga-soi-pho-goi-65g-202406201458526367.jpg', 'Mì 3 Miền gà sợi phở gói 65g với sợi mì to bản được kết hợp hoàn hảo với nước súp đậm đà và hương thơm của hành phi, mang đến một hương vị thơm ngon khó cưỡng cho người tiêu dùng.', 9, 24, 100, 0, '65g', 'Việt Nam', '2024-10-01 11:21:51', '2024-10-01 11:21:51', 0),
(1063, 'Mì khoai tây Omachi tôm chua cay Thái gói 80g', 9300, 10000, 'mi-khoai-tay-omachi-tom-chua-cay-thai-goi-80g-202209200946163653.jpg', 'Mì khoai tây Omachi tôm chua cay Thái gói 80g được làm từ nước cốt đậm đà, sợi mì vàng dai và hấp dẫn, hương vị chua cay khoái khẩu của nhiều người, phù hợp khẩu vị cả nhà', 9, 24, 100, 0, '80g', 'Việt Nam', '2024-10-01 11:28:16', '2024-10-01 11:28:16', 0),
(1064, 'Mì Hảo 100 tôm chua cay gói 65g', 3500, 4000, 'mi-hao-100-tom-chua-cay-goi-65g-201911061454028173.jpg', 'Sợi mì vàng dai ngon hòa quyện trong nước súp tôm chua cay thơm lừng, đậm đà thấm đẫm từng sợi mì sóng sánh cùng hương thơm quyến rũ ngất ngây. Mì Hảo 100 tôm chua cay gói 65g chính hãng mì Hảo 100  là lựa chọn hấp dẫn không thể bỏ qua cho những bữa ăn nhanh chóng đơn giản mà vẫn đủ chất', 9, 24, 120, 0, '65g', 'Việt Nam', '2024-10-01 11:33:32', '2024-10-01 11:33:32', 0),
(1065, 'Hủ tiếu Nam Vang hương vị Cung Đình gói 83g', 10300, 11000, '-202303231609238570.jpg', 'Hủ tiếu Nam Vang Cung Đình gói 83g là sản phẩm hủ tiếu ăn liền hương vị hủ tiếu Nam Vang đặc trưng thấm đều trong từng sợi hủ tiếu dai ngon đậm đà cực đã cùng mùi hương hấp dẫn lôi cuốn không thể chối từ', 9, 25, 120, 0, '83g', ' Việt Nam', '2024-10-01 11:57:56', '2024-10-01 11:57:56', 0),
(1066, 'Hủ tiếu sườn heo Cung Đình gói 84g', 10500, 12000, 'hu-tieu-suon-heo-cung-dinh-goi-84g-202307271513378863.jpg', 'Hủ tiếu ăn liền  tiện lợi, hấp dẫn và thơm ngon cho bữa ăn nhanh chóng. Hủ tiếu sườn heo Cung Đình gói 84g chính hãng hủ tiếu Cung Đình chất lượng với sợi hủ tiếu được bổ sung gạo ST25 thơm ngon, nước súp sườn heo đậm đà hòa quyện cho bạn bữa ăn ngon, dinh dưỡng', 9, 25, 100, 0, '84g', 'Việt Nam', '2024-10-01 12:02:46', '2024-10-01 12:02:46', 0),
(1067, 'Hủ tiếu Nam Vang Nhịp Sống gói 70g', 10300, 11000, 'hu-tieu-nhip-song-vi-nam-vang-70g-2-700x467.jpg', 'Bữa ăn cực tiện lợi và thơm ngon. Hủ tiếu Nam Vang Nhịp Sống gói 70g là sản phẩm hủ tiếu ăn liền của thương hiệu hủ tiếu Nhịp sống với hương vị hủ tiếu Nam Vang đậm đà thấm đều trong từng sợi hủ tiếu dai ngon cực đã cùng mùi hương hấp dẫn lôi cuốn không thể chối từ', 9, 25, 80, 0, '70g', 'Việt Nam', '2024-10-01 12:06:53', '2024-10-01 12:06:53', 0),
(1068, 'Phở bò tái lăn Đệ Nhất gói 68g', 10000, 10800, 'pho-bo-tai-lan-de-nhat-goi-68g-202212251138304495.jpg', 'Phở bò ăn liền hương vị chuẩn Hà Nội đậm đà với sợi phở mềm dai và nước súp phở Đệ Nhất thanh ngọt, thơm lừng. Phở bò tái lăn Đệ Nhất gói 68g chính hãng chất lượng, cho bạn món ăn nhanh, ngon như phở nấu, phù hợp cho cả gia đình', 9, 24, 100, 0, '68g', 'Việt Nam', '2024-10-01 12:12:22', '2024-10-01 12:12:22', 0),
(1069, 'Phở gà hương Đệ Nhất gói 65g', 7700, 8800, 'pho-ga-de-nhat-goi-65g-202407061035274016.jpg', 'Từng sợi phở dai ngon, trắng dẹp đậm đà nước dùng cho bạn thưởng thức tô phở thơm ngon với hương gà ngọt nước. Phở gà Đệ Nhất gói 65g chất lượng, dinh dưỡng nhanh gọn cho bữa sáng. Phở Đệ Nhất thơm ngon, tiện lợi và được nhiều người lựa chọn.\r\n', 9, 24, 98, 2, '65g', 'Việt Nam', '2024-10-01 12:17:01', '2024-10-01 12:17:01', 0),
(1070, 'Phở bò truyền thống nước trong Chinsu 131g', 33000, 35000, 'pho-bo-truyen-thong-nuoc-trong-chinsu-pho-story-goi-131g-bap-bo-va-gan-nguyen-mieng-202308011554159040.jpg', 'Phở Chinsu chính hãng chất lượng, công thức được sáng tạo bởi Phở Thìn Bờ Hồ nổi tiếng, sợi phở chín mềm nước cốt thanh ngọt. Phở bò truyền thống nước trong Chinsu Phở Story gói 131g (bắp bò và gân nguyên miếng) thơm ngon, là lựa chọn cho bữa ăn dinh dưỡng và tiện lợi.', 9, 25, 96, 4, '131g', 'Hàn Quốc', '2024-10-01 12:21:39', '2024-10-01 12:21:39', 0),
(1071, 'Nước uống i-on kiềm Akaline I-on Life 450ml', 5800, 6000, 'nuoc-khoang-i-on-life-450ml-202002222139461868.jpg', 'Sản phẩm nước uống ion kiềm chất lượng của thương hiệu I-on Life. Nước khoáng I-on Life 450ml được sản xuất dựa trên công nghệ điện phân tiên tiến của Nhật Bản, có chứa thành phần i-on kiềm với nhiều tác dụng tốt cho sức khỏe. Cam kết chính hãng nước uống I-on Life an toàn, chất lượng', 1, 23, 100, 0, '450ml', 'Việt Nam', '2024-10-01 12:31:18', '2024-10-01 12:31:18', 0),
(1072, 'Nước giải khát khoáng Vikoda 1.5 lít', 10500, 0, 'nuoc-khoang-vikoda-15-lit-202107100907132207.jpg', '100% nước khoáng thiên nhiên từ thương hiệu nước khoáng Vikoda nổi tiếng với chất lượng nước có độ kiềm tự nhiên cao. Nước khoáng Vikoda 1.5 lít chai lớn thiết kiệm, đảm bảo cho cơ thể đủ nước đủ khoáng suốt ngày dài năng động', 1, 23, 100, 0, '1.5 lít', 'Việt Nam', '2024-10-01 13:13:09', '2024-10-01 13:13:09', 0),
(1073, 'Nước khoáng tinh khiết Lama 500ml', 4800, 5000, 'nuoc-tinh-khiet-lama-500ml-202008191320547981.jpg', 'Nước tinh khiết Lama 500ml sử dụng công nghệ lọc nước tiên tiến bậc nhất hiện nay có khả năng loại bỏ đến 99% tạp chất, các loại vi khuẩn và vi sinh vật sống trong nước. Nhờ đó loại bỏ hết tất cả mùi hôi gây khó chịu', 1, 23, 100, 0, '500ml', 'Việt Nam', '2024-10-01 13:18:19', '2024-10-01 13:18:19', 0),
(1074, 'Nước khoáng Đảnh Thạnh vị chanh muối 430ml', 8400, 9000, 'nuoc-khoang-danh-thanh-vi-chanh-muoi-430ml-202106290837399678.jpg', 'Nước khoáng Đảnh Thạnh chứa nhiều khoáng chất quý hiếm tốt cho sức khỏe. Nước khoáng Đảnh Thạnh vị chanh muối 430ml với thiết kế sang trọng, chất lượng nước khoáng đạt chuẩn với độ pH = 8 cùng vị chanh muối thanh mát đảm bảo cho cơ thể luôn đủ nước đủ khoáng khỏe khoắn suốt ngày dài', 1, 22, 100, 0, '430ml', 'Việt Nam', '2024-10-01 13:23:52', '2024-10-01 13:23:52', 0),
(1075, 'Nước khoáng có ga Đảnh Thạnh Sparkling 430ml', 6900, 7000, 'nuoc-khoang-co-ga-danh-thanh-sparkling-430ml-202106290844171362.jpg', '  Nước từ nguồn khoáng của thương hiệu nước khoáng Đảnh Thạnh chứa nhiều khoáng chất quý hiếm tốt cho sức khỏe. Nước khoáng có ga Đảnh Thạnh Sparkling 430ml chất lượng nước khoáng đạt chuẩn với độ pH = 8 đảm bảo cho cơ thể luôn đủ nước đủ khoáng khỏe khoắn suốt ngày dài.', 1, 23, 100, 0, '430ml', 'Việt Nam', '2024-10-01 14:08:07', '0000-00-00 00:00:00', 0),
(1076, 'Nước khoáng có ga Vĩnh Hảo 500ml', 7900, 9000, 'nuoc-khoang-co-ga-vinh-hao-500ml-201903181334224938.jpg', 'Nước khoáng của thương hiệu nước khoáng Vĩnh Hảo trải qua quá trình tinh lọc nghiêm ngắt bằng hệ thống siêu lọc RO và tiệt trùng bằng tia cực tím trong sạch tốt cho sức khỏe. Nước khoáng có ga Vĩnh Hảo 500ml, giúp làm giảm độ chua của bao tử, giảm thiểu chứng xót dạ dày và đầy hơi.', 1, 22, 100, 0, '500ml', 'Việt Nam', '2024-10-01 14:08:07', '2024-10-01 14:08:07', 0),
(1077, 'Nước uống Good Mood vị sữa chua 455ml', 9500, 10000, 'nuoc-uong-good-mood-vi-sua-chua-455ml-202407111335443811.jpg', 'Sản phẩm nước uống đóng chai độc đáo từ thương hiệu nước uống Good Mood. Nước uống Good Mood vị sữa chua 455ml là sự hòa quyện đầy mới mẻ từ sữa chua và nước uống có thể sử dụng hàng ngày như nước lọc, bổ sung nước cho cơ thể cùng hương vị dịu nhẹ tự nhiên, giúp tinh thần tươi mới', 1, 23, 100, 0, '455ml', 'Việt Nam', '2024-10-01 14:23:28', '2024-10-01 14:23:28', 0),
(1078, 'Nước ngọt Soda Schweppes lon 320ml', 7400, 0, 'soda-schweppes-lon-330ml-202401091732426460.jpg', 'Nước ngọt sản xuất theo dây chuyền công nghệ hiện đại kiểm định nghiêm ngặt. Nước Soda Schweppes lon 320ml là thức uống giải khát giúp bổ sung vitamin và khoáng chất tốt cho cơ thể, giúp hanh chóng để bù nước cho cơ thể. Cam kết chất lượng an toàn từ thương hiệu nước ngọt Schweppes', 16, 7, 80, 0, '320ml', 'Hà Lan', '2024-10-01 14:29:17', '2024-10-01 14:29:17', 0),
(1079, 'Thịt ba chỉ bò Mỹ cuộn Orifood 300g', 118000, 120000, 'thit-ba-chi-bo-my-cat-cuon-orifood-khay-300g-202304031521581225.jpg', 'Thịt đông lạnh Orifood là thương hiệu chuyên cung cấp thịt bò đông lạnh vô cùng chất lượng, được nhiều khách hàng quan tâm và tin dùng, với chất lượng rất đáng tin cậy. Thịt ba chỉ bò Mỹ cuộn Orifood 300g với thị đạt chuẩn từ Mỹ, cho vị ngon khó cưỡng, giàu chất dinh dưỡng.', 8, 12, 50, 0, '300g', ' Mỹ', '2024-10-01 14:34:54', '2024-10-01 14:34:54', 0),
(1080, 'Nước ép trái cây thạch dừa Jele X hương vải 320ml', 19500, 20000, 'nuoc-ep-co-thach-dua-jele-x-huong-nho-320ml-clone-202407121530221452.jpg', 'Nước ép có thạch dừa Jele X hương vải 320ml là nước ép nho trắng từ nước ép nho trắng cô đặc 20%, có thêm thạch dừa giòn dai và hương dưa hấu giúp giải khát tức thời, nước ép Jele X được nhập khẩu từ Thái Lan, bổ sung thêm vitamin B2, vitamin B12 và vitamin B6 cho cơ thể.', 7, 17, 120, 0, '320ml', 'Thái Lan', '2024-10-01 14:41:51', '2024-10-01 14:41:51', 0),
(1081, 'Lốc 6 hộp sữa đậu nành có đường Fami Canxi 200ml', 32000, 35000, 'loc-6-hop-sua-dau-nanh-co-duong-fami-canxi-200ml-202407161353213030.jpg', 'Sữa đậu nành Fami được bổ sung thêm canxi, vitamin D3 và vitamin B12 giúp chắc khoẻ xương. Sữa đậu nành còn mang hượng vị thơm ngon, dễ uống vô cùng. Sản phẩm lốc 6 hộp sữa đậu Fami Canxi 200ml đóng gói tiện dùng, tiết kiệm.', 6, 18, 98, 2, '200ml/hộp', 'Việt Nam', '2024-10-01 14:45:03', '2024-10-01 14:45:03', 0),
(1082, 'Mực ống 500g (10 - 13 con)', 119000, 125000, 'muc-ong-nguyen-con-khay-500g-15-20cm-con-202207221121044455.jpg', 'Mực ống nguyên con, thịt dai, tươi, giòn và ngọt thịt. Mực ống được đóng khay 450g - 550g, khoảng 15 - 20cm/con. Mực được đóng túi hút chân không.', 4, 21, 99, 1, '500g', 'Đan Mạch', '2024-10-01 14:50:47', '2024-10-01 14:50:47', 0),
(1083, 'Pate thịt đóng hộp cột đèn Hải Phòng Hạ Long 90g', 20000, 21000, 'pate-thit-dong-hop-cot-den-hai-phong-ha-long-hop-90g-202201040819001650.jpg', 'Pate Hạ Long thơm ngon kích thích vị giác của người dùng. Pate thịt đóng hộp cột đèn Hải Phòng Hạ Long hộp 90g với thịt heo và gan heo được chọn lựa kỹ lưỡng tươi ngon an toàn đến sức khỏe người dùng. Pate hộp tiện lợi, cho bữa ăn thêm tròn vị đậm đà và không kém phần hấp dẫn. ', 3, 10, 100, 0, '90g', 'Việt Nam', '2024-10-01 14:58:49', '2024-10-01 14:58:49', 0),
(1084, 'Pate gan đóng hộp Hạ Long Việt Nam 170g', 30000, 37000, 'pate-gan-ha-long-170g-2-700x467.jpg', 'Gồm thịt heo, gan heo,...được chọn lựa kĩ càng, quy trình chế biến được kiểm tra nghiêm ngặt, không lẫn tạp chất hóa học độc hại, luôn mang đến chất lượng tốt nhất cho người tiêu dùng. Pate gan heo Hạ Long hộp 170g đóng hộp nhỏ gọn, tiện lợi sử dụng trong gia đình hoặc mang đi du lịch.', 3, 10, 100, 0, '170g', 'Việt Nam', '2024-10-01 15:04:54', '2024-10-01 15:04:54', 0),
(1085, 'Thịt viên đống hộp xốt cà chua Cây Thị 120g', 15000, 20000, 'thit-vien-xot-ca-chua-cay-thi-120g-202405311019414383.jpg', 'Thịt Cây Thị là sản phẩm chất lượng được nhiều người yêu thích lựa chọn sử dụng. Thịt viên xốt cà chua Cây Thị 120g mang hương vị thơm ngon cho món ăn của bạn thêm đậm đà và hấp dẫn. Thịt được làm từ những thành phần an toàn cho người sử dụng.\r\n', 3, 10, 100, 0, '120g', 'Việt Nam', '2024-10-01 15:10:07', '2024-10-01 15:10:07', 0),
(1086, 'Bò đóng hộp hai lát Vissan 170g', 39000, 40000, 'bo-hai-lat-vissan-hop-170g-201908231421197157.jpg', 'Thành phần bao gồm thịt bò, thịt heo cùng các loại gia vị khác được chọn lựa kĩ càng. Với bò 2 lát Vissan hộp 170g của thương hiệu thịt bò hộp Vissan,  bạn sẽ tiết kiệm thời gian nấu ăn, chỉ cần làm nóng lại thịt bò hộp trước khi dùng là đã sẵn sàng cho một món ăn thơm ngon bổ dưỡng.', 3, 10, 100, 0, '170g', 'Việt Nam', '2024-10-01 15:38:10', '2024-10-01 15:38:10', 0),
(1087, 'Thịt heo Spam Classic Hormel Foods 340g', 137000, 150000, 'thit-heo-spam-classic-hormel-foods-hop-340g-201910061032078950.jpg', 'Tiện lợi, thơm ngon, dinh dưỡng. Thịt heo Spam Classic Hormel Foods hộp 340g giúp tiết kiệm thời gian cho chị em nội trợ bận rộn nhưng vẫn muốn bữa ăn đầy đủ dưỡng chất. Heo hộp của thương hiệu heo hộp Hormel Foods chất lượng, đậm đà gia vị, ăn ngon mà không bị ngán.', 3, 10, 100, 0, '340g', 'Mỹ', '2024-10-01 15:44:18', '2024-10-01 15:44:18', 0),
(1088, 'Cá nục kho tiêu Sea Crown hộp 155g', 16800, 18000, 'ca-nuc-kho-tieu-sea-crown-hop-155g-201905211925072786.jpg', 'Được làm hoàn toàn từ cá nục tươi cùng với các loại gia vị như sốt, ớt, hành, tiêu đen,...và ngâm trong một loại dầu cao cấp để giúp cá mềm và ngậy hơn, kết hợp với hương tiêu đen thơm ngon, cay nồng đã tạo nên một món ăn đầy thơm ngon và tiện lợi.', 3, 10, 100, 0, '155g', 'Thái Lan', '2024-10-01 15:49:51', '2024-10-01 15:49:51', 0),
(1128, 'Cải thìa 500g', 7300, 11000, 'cai-thia-202312271059011562.jpg', 'Cải thìa là một nguồn vô cùng giàu chất dinh dưỡng, vitamin và khoáng chất. Rất nhiều lợi ích cho sức khỏe, bao gồm vai trò tăng cường hệ miễn dịch, bảo vệ sức khỏe của mắt, ngăn ngừa bệnh mãn tính, tăng cường sức khỏe tim mạch, xây dựng xương chắc khỏe, tăng cường tuần hoàn và tăng nhanh khả năng mau chóng lành bệnh.', 5, 15, 125, 0, '500g', 'Việt Nam', '2024-08-21 23:19:28', '2024-08-21 23:19:28', 0),
(1129, 'Nước cam ép trái cây có tép Teppy 1 lít', 23000, 0, 'nuoc-ep-teppy-pet-1l-2-org.jpg', 'Chiết xuất từ những quả cam mọng nước cùng với những tép cam tươi hấp dẫn tự nhiên. Và được sản xuất theo công nghệ hiện đại, không chất độc hại không ảnh hưởng đến sức khỏe người tiêu dùng. 6 chai nước cam có tép Teppy 327ml chứa nhiều vitamin C hỗ trợ cung cấp năng lượng cho cơ thể.\r\n', 7, 16, 96, 4, '1 lít', 'Việt Nam', '2024-08-21 23:29:49', '2024-08-21 23:32:28', 0),
(1130, 'Trà đen C2 hương vị đào chai 225ml', 7000, 7500, 'tra-den-c2-huong-dao-chai-230ml-202310230824365148.jpg', 'Chắt lọc từ 100% trà tự nhiên chế biến và đóng chai trong cùng 1 ngày bởi trà C2, đem đến hương vị trà đậm đà tuyệt vời. Trà đen C2 hương đào chai 225ml mang lại cho bạn lựa chọn mới trong thưởng thức trà, giúp giải nhanh cơn khát, bổ sung năng lượng cho ngày dài năng động và sảng khoái', 7, 17, 77, 3, '225ml', 'Việt Nam', '2024-08-21 23:39:07', '2024-08-21 23:42:01', 0),
(1131, 'Sữa tươi tiệt trùng ít đường TH true MILK hộp 1 lít', 39000, 0, 'sua-tuoi-tiet-trung-it-duong-th-true-milk-hop-1-lit-202104081703261728.jpg', 'Sữa tươi TH True Milk không sử dụng thêm hương liệu, vị ngon 100% đến từ sữa tươi từ trang trại TH True Milk nên được các bà mẹ ưu tiên lựa chọn hàng đầu. Sữa tươi tiệt trùng ít đường TH true MILK hộp 1 lít đóng hộp lớn tiện lợi, tiết kiệm.', 6, 18, 60, 10, '1 lít', 'Việt Nam', '2024-08-21 23:52:03', '2024-08-21 23:54:28', 0),
(1132, 'Sữa tiệt trùng không đường Dutch Lady bịch 180ml', 7600, 0, 'sua-tiet-trung-khong-duong-dutch-lady-bich-180ml-202308150958355288.jpg', 'Sữa tiệt trùng không đường Dutch Lady bịch 180ml đóng bịch tiện lợi, dễ dàng sử dụng. Sữa tươi Dutch Lady là nguồn bổ sung canxi và protein thiết yếu mỗi ngày, giúp cơ thể khoẻ mạnh, cao lớn hơn. Sữa tươi không đường với hương vị thơm ngon, dễ uống.', 6, 18, 53, 7, '180ml', 'Việt Nam', '2024-08-21 23:58:15', '2024-08-22 00:00:04', 0),
(1133, 'Sữa đậu nành nguyên chất ít đường Fami bịch 200ml', 4600, 0, 'sua-dau-nanh-nguyen-chat-it-duong-fami-bich-200ml-202408011310069877.jpg', 'Sản phẩm sữa đậu nành ít đường Fami 200ml được làm từ 100% đậu nành hạt chọn lọc, sữa đậu nành Fami mang đến 100% đạm thực vật, sữa đậu nành Fami với hương vị thơm ngon, mát lành, giúp cân bằng đạm cho cả gia đình.', 6, 18, 60, 0, '200ml/bịch', 'Việt Nam', '2024-08-22 00:03:18', '2024-08-22 00:06:08', 0),
(1134, 'Lốc 4 hộp sữa lúa mạch ít đường Milo 110ml', 22000, 0, 'loc-4-hop-sua-lua-mach-cacao-it-duong-milo-active-go-115ml-202407151506552711.jpg', 'Sữa lúa mạch Milo thơm ngon từ lúa mạch, cung cấp đạm và canxi cho cơ thể. Milo từ lâu luôn là thương hiệu sữa uống lúa mạch được các bé yêu thích. Lốc 4 hộp sữa lúa mạch cacao ít đường Milo 110ml cung cấp 7 loại vitamin và khoáng chất cho bé giải phóng năng lượng hiệu quả.\r\n ', 6, 19, 100, 0, '110ml/hộp', 'Việt Nam', '2024-08-22 00:20:02', '2024-08-22 00:22:34', 0),
(1135, 'Lốc 4 hộp sữa lúa mạch vị socola Ovaltine bổ sung canxi\r\n\r\n', 35000, 40000, 'loc-4-hop-sua-lua-mach-vi-socola-ovaltine-bo-sung-canxi-180ml-202305061029439502.jpg', 'Lốc 4 hộp sữa lúa mạch vị socola Ovaltine bổ sung canxi 180ml chứa gấp đôi canxi so với ly sữa bò tươi, giúp cung cấp năng lượng và phát triển xương khớp và chiều cao. Sữa lúa mạch Ovaltine là nhãn hiệu sữa lúa mạch vị socola thơm ngon, được rất nhiều người tiêu dùng ưa chuộng.', 6, 19, 62, 0, '180ml/hộp', 'Việt Nam', '2024-08-22 00:25:24', '2024-08-22 00:28:05', 0),
(1136, 'Lốc 4 hộp sữa chua uống hương bạc hà và việt quất YoMost 170ml', 32500, 34500, 'loc-4-hop-sua-chua-uong-huong-bac-ha-va-viet-quat-yomost-170ml-202310071730499249.jpg', 'Thương hiệu sữa chua Yomost mang đến những dòng sản phẩm được làm từ sữa chua lên men tự nhiên, mang đến nhiều loại dinh dưỡng cần thiết và protein cho cơ thể. Đặc biệt, Lốc 4 hộp sữa chua uống hương bạc hà và việt quất YoMost 170ml còn mang hương thơm bạc hà việt quất lạ miệng, độc đáo.', 6, 18, 120, 0, '170ml/hộp', 'Việt Nam', '2024-08-22 00:31:05', '2024-08-22 00:33:36', 0),
(1137, 'Nước tương đậu nành Maggi thanh dịu chai 450ml', 20000, 0, 'nuoc-tuong-dau-nanh-thanh-diu-maggi-chai-450ml-202308121813517143.jpg', 'Nước tương Maggi được lên men từ những hạt đậu nành tự nhiên chọn cho ra từng giọt nước tương đậm đà, thơm ngon với vị thanh dịu hài hòa. Nước tương đậu nành Maggi thanh dịu 450ml thích hợp dùng để chấm hoặc nêm, ướp món ăn cho cả món chay lẫn món mặn.', 2, 20, 98, 2, '450ml', 'Việt Nam', '2024-08-22 02:12:04', '2024-08-22 02:14:24', 0),
(1138, 'Nước mắm cá cơm Nam Ngư 12 độ đạm chai 500ml', 39500, 40000, 'nuoc-mam-nam-ngu-10-do-dam-chai-500ml-202306211032176857.jpg', 'Nước mắm Nam Ngư đem đến cho người tiêu dùng Việt Nam những giọt nước mắm thơm ngon, sự lựa chọn hàng đầu của người Việt. Nước mắm Nam Ngư 12 độ đạm chai 500ml với dây chuyền khép kín với thành phần cá cơm tươi ngon tạo nên hương vị thơm ngon, đậm đà, màu sắc hấp dẫn.', 2, 20, 89, 11, '500ml', 'Việt Nam', '2024-08-22 02:24:08', '2024-08-22 02:28:17', 0),
(1139, 'Bạch tuộc 500g (10 - 13 con)\r\n\r\n', 79000, 90000, '-202407082248561083.jpg', 'Bạch tuộc là một loại hải sản được rất nhiều người ưa thích bởi vì hương vị thơm ngon đặc trưng khó cưỡng của nó, bạch tuộc cũng chứa rất nhiều giá trị dinh dưỡng.', 4, 12, 49, 1, '500g', 'Việt Nam', '2024-08-22 02:35:32', '2024-08-22 02:40:42', 0),
(1140, 'Tôm thẻ nguyên con Túi 250g', 47000, 0, 'tom-the-nguyen-con-202403061037383281.jpg', 'Tôm thẻ thường có vị ngọt và thanh đạm, cùng với mức giá “mềm” hơn so với tôm sú nên loài tôm này thường được sử dụng phổ biến trong những bữa ăn của gia đình Việt Nam. Sau đây Tép Bạc sẽ gợi ý chị em nội trợ 2 món ngon được làm từ tôm thẻ', 4, 21, 109, 11, '259g ', 'Việt Nam', '2024-08-22 02:51:45', '2024-08-22 02:57:05', 0),
(1141, 'Rau ngò gai, rau om', 2400, 2500, 'ngo-gai-rau-om-202404110910143317.jpg', 'Rau ngò ôm hay còn gọi là rau ngổ, thường mọc nhiều ở ao, rạch, mương và thường được trồng làm gia vị, nêm trong món canh chua, lẩu chua, giả cầy, phở, lươn um... ', 5, 5, 100, 0, '50g', 'Việt Nam', '2024-08-22 03:04:21', '2024-08-22 03:08:25', 0),
(1142, 'Bí xanh trái từ 400g trở lên', 7000, 8100, '-202406200950442294.jpg', 'Bí đao hay còn có tên gọi khác là bí phấn hay bí trắng là loài quả thuộc họ bầu bí. Cây bí đao có dạng dây leo, có thể được trồng bằng giàn hoặc bò trên mặt đất như các loại dưa.', 5, 15, 60, 0, '500g', 'Việt Nam', '2024-08-22 03:19:59', '2024-08-22 03:19:59', 0),
(1143, 'Xốt mayonnaise Simply hương gạo rang chai 230g\r\n\r\n', 39000, 0, 'sot-mayonnaise-simply-huong-gao-rang-chai-230g-202011230918238966.jpg', 'Xốt mayonnaise Simply là loại xốt mayonnaise dùng để chấm trực tiếp, trộn salad hoặc ăn kèm với các món như bánh mì, sandwich,... Xốt mayonnaise hương gạo rang Simply chai 230g với thành phần dầu gạo lứt tốt cho tim mạch cùng vị chua nhẹ.', 2, 3, 35, 5, '230g', 'Việt Nam', '2024-08-22 03:48:49', '2024-08-22 03:51:40', 0),
(1144, 'Nước khoáng tinh khiết Aquafina 355ml', 5200, 6000, 'nuoc-tinh-khiet-aquafina-355ml-202407091406304694.jpg', 'Nước tinh khiết của thương hiệu nước suối Aquafina được lấy từ nguồn nước ngầm đảm bảo  trải qua quy trình khử trùng, lọc sạch các tạp chất. Nước tinh khiết Aquafina 355ml đã đạt tới trình độ nước tinh khiết có tác dụng dịu cơn khát, khi uống sẽ có cảm giác hơi ngọt ở miệng, rất dễ uống.', 1, 22, 99, 1, '355ml', 'Việt Nam', '2024-08-22 04:05:23', '2024-08-22 04:08:28', 0),
(1145, 'Nước khoáng tinh khiết La Vie 350ml', 4900, 0, 'nuoc-khoang-la-vie-350ml-202112310822437928.jpg', 'Được sản xuất từ nguồn nước khoáng sâu trong lòng đất, được lọc qua nhiều tầng địa chất giàu khoáng chất, hấp thu muối, các yếu tố vi lượng như calcium, magie, potassium, sodium, bicarbonate... ', 1, 22, 56, 4, '350', 'Việt Nam', '2024-08-22 04:11:21', '2024-08-22 04:13:57', 0),
(1146, 'Bắp cải trắng bắp từ 700g trở lên', 7000, 9500, 'bap-cai-trang-bap-tu-700g-tro-len-202404171102288487.jpg', 'Bắp cải có hình tròn dẹp, lá màu trắng xanh đặc trưng và các lá được ôm chặt với nhau. Bắp cải có vị ngọt tự nhiên, giàu chất sơ, ít chất béo nên rất nhiều người sử dụng', 5, 15, 100, 0, '700g ', 'Việt Nam', '2024-08-22 23:07:26', '2024-08-22 23:10:31', 0),
(1147, 'Cá he làm sạch 450-550g (3 - 4 con)', 62000, 66000, 'ca-he-lam-sach-450-550g-3-7-con-202403071421147363.jpg', 'Cá he là loài cá sinh sống sống chủ yếu ở các vùng nước ngọt. Đặc biệt là ở miền Tây Nam Bộ, nơi có sông Mê Kông từ thượng nguồn đổ xuống và cá he sẽ xuất hiện nhiều hơn khi vào mùa nước nổi.', 4, 21, 78, 2, '450g-550g', 'Việt Nam', '2024-08-22 23:18:27', '2024-08-22 23:24:02', 0),
(1148, 'Nước ép trái cây nhiệt đới Fontana 1 lít', 58000, 0, 'nectar-trai-cay-nhiet-doi-fontana-1-lit-202003281106070794.jpg', 'Mang vị chua thanh đặc trưng của trái cây nhiệt đới táo, kiwi, dứa, cam, đào,... là thức uống nước ép thơm ngon, bổ dưỡng cung cấp năng lượng cùng chất dinh dưỡng để phục hồi.', 7, 16, 89, 5, '1 Lít', 'Việt Nam', '2024-08-22 23:48:30', '2024-08-22 23:53:31', 0),
(1149, 'Thùng 48 hộp sữa chua uống hương dâu YoMost 170ml', 311000, 320000, 'thung-48-hop-sua-chua-uong-huong-dau-yomost-170ml-202310071756579913.jpg', 'Thương hiệu sữa chua Yomost mang đến những dòng sản phẩm được làm từ sữa chua uống lên men tự nhiên, kết hợp với trái cây thơm ngon, cung cấp nhiều loại dinh dưỡng cần thiết và protein cho cơ thể. ', 6, 23, 46, 6, '170ml', 'Việt Nam', '2024-08-23 00:12:43', '2024-08-23 00:17:31', 0),
(1150, 'Thùng 48 hộp sữa chua uống tiệt trùng hương việt quất 180ml', 345000, 380000, 'thung-48-hop-sua-chua-uong-huong-viet-quat-th-true-yogurt-180ml-202212271136133023.jpg', 'Sữa chua uống TH True Yogurt với vị ngon hoàn toàn từ sữa tươi, đảm bảo không có sữa bột, kết hợp với hương vị trái cây tự nhiên mang đến vị sữa chua uống ngon tuyệt vời.', 6, 18, 43, 7, '180ml/Hộp', 'Việt Nam', '2024-08-23 00:23:40', '2024-08-23 00:25:51', 0),
(1151, 'Bánh pizza 3 loại thịt phô mai Kitkool hộp 140g', 33000, 0, 'banh-pizza-3-loai-thit-pho-mai-kitkool-hop-140g-202403251004094804.jpg', 'Pizza Kitkool là thương hiệu bánh pizza rất nổi tiếng tại Việt Nam, đa dạng sản phẩm. Bánh pizza 3 loại thịt phô mai Kitkool hộp 140g từ nguyên liệu tươi ngon, đế bánh mỏng, nhân 3 loại thịt xốt phô mai cực thơm ngon.', 3, 10, 47, 3, '140g', 'Việt Nam', '2024-08-23 00:31:21', '2024-08-23 00:44:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_tl` varchar(191) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `ten_tl`, `ngay_tao`, `ngay_sua`, `status`) VALUES
(1, 'Nước giải khát', '2024-08-20 14:58:00', '2024-08-20 05:14:04', 0),
(2, 'Gia Vị, Nguyên liệu', '2024-08-20 03:05:03', '2024-08-20 03:05:03', 0),
(3, 'Thực phẩm đóng hộp\r\n', '2024-08-21 02:19:34', '2024-08-21 02:19:56', 0),
(4, 'Cá, hải sản', '2024-08-21 03:45:11', '2024-08-21 03:45:36', 0),
(5, 'rau, củ, quả', '2024-08-21 21:27:42', '2024-08-21 21:28:24', 0),
(6, 'Sữa các loại', '2024-08-21 23:45:38', '2024-08-21 23:45:57', 0),
(7, 'Nước trái cây', '2024-09-30 15:19:41', '2024-09-30 15:19:41', 0),
(8, 'Thịt các loại', '2024-09-30 17:07:43', '2024-09-30 17:07:43', 0),
(9, 'Mì, miến, cháo, phở', '2024-09-30 18:36:04', '2024-09-30 18:36:04', 0),
(16, 'Nước ngọt', '2024-09-26 11:56:21', '2024-09-26 11:56:21', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `cthoadon_ibfk_1` (`id_hoadon`);

--
-- Indexes for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `ctphieunhap_ibfk_1` (`id_phieunhap`);

--
-- Indexes for table `ctphieutra`
--
ALTER TABLE `ctphieutra`
  ADD KEY `fk_ctphieutra_sanpham` (`id_sp`),
  ADD KEY `fk_ctphieutra_phieutra` (`id_phieutra`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhanhsp_ibfk_1` (`id_sp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`id_monan`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ten_dangnhap` (`ten_dangnhap`),
  ADD KEY `fk_nhanvien_loainhanvien` (`id_loainv`),
  ADD KEY `fk_nhanvien_quyend` (`id_quyen`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nv` (`id_nv`);

--
-- Indexes for table `phieutra`
--
ALTER TABLE `phieutra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_phieutra_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyendahmuc`
--
ALTER TABLE `quyendahmuc`
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nha_cc` (`id_nha_cc`),
  ADD KEY `id_the_loai` (`id_the_loai`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6791;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `loainhanvien`
--
ALTER TABLE `loainhanvien`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `id_monan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333333889;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phieutra`
--
ALTER TABLE `phieutra`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2408;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1156;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`id_phieunhap`) REFERENCES `phieunhap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctphieunhap_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `ctphieutra`
--
ALTER TABLE `ctphieutra`
  ADD CONSTRAINT `fk_ctphieutra_phieutra` FOREIGN KEY (`id_phieutra`) REFERENCES `phieutra` (`id`),
  ADD CONSTRAINT `fk_ctphieutra_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD CONSTRAINT `hinhanhsp_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_loainhanvien` FOREIGN KEY (`id_loainv`) REFERENCES `loainhanvien` (`id`),
  ADD CONSTRAINT `fk_nhanvien_quyend` FOREIGN KEY (`id_quyen`) REFERENCES `quyen` (`id`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`id_nv`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `phieutra`
--
ALTER TABLE `phieutra`
  ADD CONSTRAINT `fk_phieutra_nhanvien` FOREIGN KEY (`id_nhanvien`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_nha_cc`) REFERENCES `nhacungcap` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_the_loai`) REFERENCES `theloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
