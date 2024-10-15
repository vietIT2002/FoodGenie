import mysql.connector
import pandas as pd

DATABASE_CONFIG = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'foodgennie'
}

def fetch_data(query):
    conn = mysql.connector.connect(**DATABASE_CONFIG)
    df = pd.read_sql(query, conn)
    conn.close()
    return df
