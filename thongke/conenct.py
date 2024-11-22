import pandas as pd
from sqlalchemy import create_engine

# Thông tin kết nối cơ sở dữ liệu MySQL
DB_USER = 'root'
DB_PASSWORD = ''
DB_HOST = 'localhost'
DB_NAME = 'foodgennie'

# Cấu hình kết nối
def get_data(query):
    db_connection_str = f'mysql+pymysql://{DB_USER}:{DB_PASSWORD}@{DB_HOST}/{DB_NAME}'
    engine = create_engine(db_connection_str)
    # Truy vấn dữ liệu từ cơ sở dữ liệu
    data = pd.read_sql(query, engine)
    return data
