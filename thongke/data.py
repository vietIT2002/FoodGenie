from conenct import get_data

# .........Tổng doanh thu.............#
def get_total_revenue():
    query = '''
        SELECT SUM(tong_tien) AS total_revenue
        FROM hoadon
        WHERE trang_thai = '1'
    '''
    data = get_data(query)
    return data['total_revenue'][0]
#........................................#


# ..........Tổng đơn hàng đã bán..........#
def get_confirmed_orders():
    query = '''
        SELECT COUNT(*) AS confirmed_orders
        FROM hoadon
        WHERE trang_thai = '1'
    '''
    data = get_data(query)
    return data['confirmed_orders'][0]
#........................................#


# ............Số lượng sản phẩm đã bán..............
def get_total_sold_products():
    query = '''
        SELECT SUM(c.so_luong) AS total_sold_products
        FROM cthoadon c
        JOIN hoadon h ON c.id_hoadon = h.id
        WHERE h.trang_thai = '1'
    '''
    data = get_data(query)
    return data['total_sold_products'][0]
#..................................................#


# ............Số lượng chờ vận chuyển..............#
def get_total_Quantity_Awaiting_Shipment():
    query = '''
        SELECT SUM(c.so_luong) AS total_Quantity_Awaiting_Shipment
        FROM cthoadon c
        JOIN hoadon h ON c.id_hoadon = h.id
        WHERE h.trang_thai = '0'
    '''
    data = get_data(query)
    return data['total_Quantity_Awaiting_Shipment'][0]
#..................................................#



#................Tiền nhập hàng....................#
def get_total_purchase_cost():
    query = '''
        SELECT SUM(tong_tien) AS total_purchase_cost
        FROM phieunhap
    '''
    data = get_data(query)
    return data['total_purchase_cost'][0]
#..................................................#



#.................Tiền hoàn trả...................#
def get_total_refunds():
    query = '''
        SELECT SUM(tien_hoan_tra) AS total_refunds
        FROM cttrahang
    '''
    data = get_data(query)
    return data['total_refunds'][0]
#..................................................#


#..................Số lượng sản phẩm nhập vào...........#
def get_total_purchased_products():
    query = '''
        SELECT SUM(so_luong) AS total_purchased_products
        FROM ctphieunhap
    '''
    data = get_data(query)
    return data['total_purchased_products'].iloc[0] if not data.empty else 0
#......................................................#


#...................Số lượng tồn kho....................#
def get_total_Inventory_Quantity():
    query = '''
        SELECT SUM(so_luong) AS total_Inventory_Quantity
        FROM sanpham
    '''
    data = get_data(query)
    return data['total_Inventory_Quantity'].iloc[0] if not data.empty else 0
#......................................................#


#.............Hàm lấy doanh thu theo tháng.............#
def get_monthly_revenue():
    query = '''
        SELECT 
            YEAR(ngay_tao) AS nam,
            MONTH(ngay_tao) AS thang,
            SUM(tong_tien) AS doanh_thu
        FROM hoadon
        WHERE trang_thai = 1
        GROUP BY YEAR(ngay_tao), MONTH(ngay_tao)
    '''
    return get_data(query)
#......................................................#



#.........Hàm lấy số lượng sản phẩm bán ra theo tháng......#
def get_monthly_sales():
    query = '''
        SELECT 
            YEAR(hd.ngay_tao) AS nam,
            MONTH(hd.ngay_tao) AS thang,
            SUM(cth.so_luong) AS so_luong
        FROM hoadon hd
        JOIN cthoadon cth ON hd.id = cth.id_hoadon
        WHERE hd.trang_thai = 1
        GROUP BY YEAR(hd.ngay_tao), MONTH(hd.ngay_tao)
        ORDER BY nam, thang
    '''
    return get_data(query)
#..........................................................#


# #.............Dữ liệu doanh thu theo tháng.............#
# def get_monthly_revenue():
#     query = '''
#         SELECT 
#             YEAR(ngay_tao) AS nam,
#             MONTH(ngay_tao) AS thang,
#             SUM(tong_tien) AS doanh_thu
#         FROM hoadon
#         GROUP BY YEAR(ngay_tao), MONTH(ngay_tao)
#     '''
#     return get_data(query)
# #......................................................#


#...........Thống kê sảdef get_product_categorys():
def get_product_categorys():
    query = '''
         SELECT MONTH(h.ngay_tao) AS thang, tl.ten_tl, SUM(ct.so_luong) AS so_luong_ban
        FROM hoadon h
        JOIN cthoadon ct ON h.id = ct.id_hoadon
        JOIN sanpham sp ON ct.id_sanpham = sp.id
        JOIN theloai tl ON sp.id_the_loai = tl.id
        WHERE h.trang_thai = 1
        GROUP BY thang, tl.ten_tl
        ORDER BY thang;
            '''
    data = get_data(query)
    return data


#.....................Dữ liệu sản phẩm bán chạy và bán ít nhất.................#
def get_top_and_least_sold_products():
    query = '''
        WITH MonthlySales AS (
            SELECT 
                s.ten_sp,
                MONTH(h.ngay_tao) AS thang,
                SUM(c.so_luong) AS tong_so_luong
            FROM cthoadon c
            JOIN sanpham s ON c.id_sanpham = s.id
            JOIN hoadon h ON c.id_hoadon = h.id
            GROUP BY s.ten_sp, MONTH(h.ngay_tao)
        ),
        MaxSales AS (
            SELECT 
                thang,
                MAX(tong_so_luong) AS max_so_luong
            FROM MonthlySales
            GROUP BY thang
        ),
        MinSales AS (
            SELECT 
                thang,
                MIN(tong_so_luong) AS min_so_luong
            FROM MonthlySales
            GROUP BY thang
        )
        SELECT 
            ms.thang,
            ms.ten_sp,
            ms.tong_so_luong,
            CASE 
                WHEN ms.tong_so_luong = mx.max_so_luong THEN 'Bán chạy nhất'
                WHEN ms.tong_so_luong = mn.min_so_luong THEN 'Bán ít nhất'
            END AS loai_san_pham
        FROM MonthlySales ms
        LEFT JOIN MaxSales mx ON ms.thang = mx.thang AND ms.tong_so_luong = mx.max_so_luong
        LEFT JOIN MinSales mn ON ms.thang = mn.thang AND ms.tong_so_luong = mn.min_so_luong
        WHERE ms.tong_so_luong = mx.max_so_luong OR ms.tong_so_luong = mn.min_so_luong
    '''
    return get_data(query)
#.....................Dữ liệu sản phẩm bán chạy và bán ít nhất.................#


#.............Dữ liệu doanh thu theo sản phẩm...............#
def get_top_products_revenue():
    query = '''
        SELECT 
            s.ten_sp AS ten_san_pham,
            SUM(c.so_luong * s.don_gia) AS doanh_thu
        FROM cthoadon c
        JOIN sanpham s ON c.id_sanpham = s.id
        JOIN hoadon h ON c.id_hoadon = h.id
        GROUP BY s.ten_sp
        ORDER BY doanh_thu DESC
        LIMIT 10
    '''
    return get_data(query)
#............................................................#


#...............Khách hàng theo cấp thành viên..............#
def get_customer_levels():
    query = '''
        SELECT 
            CASE 
                WHEN k.tong_tien_muahang >= 15000000 THEN 'Kim cương'
                WHEN k.tong_tien_muahang >= 5000000 THEN 'Bạch kim'
                WHEN k.tong_tien_muahang >= 3000000 THEN 'Vàng'
                WHEN k.tong_tien_muahang >= 500000 THEN 'Bạc'
                ELSE 'Mới'
            END AS thanhvien,
            COUNT(DISTINCT k.id) AS so_khach_hang
        FROM khachhang k
        GROUP BY thanhvien
    '''
    return get_data(query)
#............................................................#
