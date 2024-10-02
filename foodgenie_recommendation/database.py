# database.py
from sqlalchemy import create_engine
import pandas as pd

# Load data from MySQL database
def load_data():
    # Cấu hình kết nối với MySQL qua SQLAlchemy
    engine = create_engine('mysql+pymysql://root:@localhost/foodgennie')
    
    # Tải dữ liệu từ các bảng vào các DataFrame
    khachhang_df = pd.read_sql('SELECT * FROM khachhang', engine)
    sanpham_df = pd.read_sql('SELECT * FROM sanpham', engine)
    hoadon_df = pd.read_sql('SELECT * FROM hoadon', engine)
    cthoadon_df = pd.read_sql('SELECT * FROM cthoadon', engine)
    theloai_df = pd.read_sql('SELECT * FROM theloai', engine)
    
    return khachhang_df, sanpham_df, hoadon_df, cthoadon_df, theloai_df

