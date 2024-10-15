import pandas as pd
from surprise import Dataset, Reader, SVD
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
from config import fetch_data


def prepare_data():
    sanpham = fetch_data("SELECT * FROM sanpham")
    hoadon = fetch_data("SELECT * FROM hoadon")
    cthoadon = fetch_data("SELECT * FROM cthoadon")

    hoadon_ct = hoadon.merge(cthoadon, left_on='id', right_on='id_hoadon')
    hoadon_ct = hoadon_ct.merge(sanpham, left_on='id_sanpham', right_on='id')


    print("Các cột trong hoadon_ct:", hoadon_ct.columns.tolist())

    if 'so_luong_x' not in hoadon_ct.columns or 'ten_sp' not in hoadon_ct.columns or 'id_khachhang' not in hoadon_ct.columns:
        print("Một hoặc nhiều cột không tồn tại trong DataFrame.")
        print("Các cột có trong hoadon_ct:", hoadon_ct.columns.tolist())
        return sanpham, pd.DataFrame() 

    data = hoadon_ct[['id_khachhang', 'ten_sp', 'so_luong_x']]

    if data.empty:
        print("Dữ liệu rỗng, không thể gợi ý sản phẩm.")
        return sanpham, pd.DataFrame()  

    return sanpham, data

def get_hybrid_recommendations(user_id):
    sanpham, data = prepare_data()

    reader = Reader(rating_scale=(1, 5))
    dataset = Dataset.load_from_df(data[['id_khachhang', 'ten_sp', 'so_luong_x']], reader)
    trainset = dataset.build_full_trainset()
    model = SVD()
    model.fit(trainset)

   
    user_items = data[data['id_khachhang'] == user_id]
    product_ids = user_items['ten_sp'].unique()

    collaborative_recommendations = set()
    
    for product in product_ids:
        similar_users = data[data['ten_sp'] == product]['id_khachhang'].unique()
        
        for user in similar_users:
            if user != user_id:  
                purchased_products = data[data['id_khachhang'] == user]['ten_sp']
                collaborative_recommendations.update(purchased_products)

    collaborative_recommendations.difference_update(product_ids)

    collaborative_recommendations = list(collaborative_recommendations)

    tfidf = TfidfVectorizer()
    tfidf_matrix = tfidf.fit_transform(sanpham['noi_dung'])
    cosine_sim = cosine_similarity(tfidf_matrix, tfidf_matrix)

    content_based_recommendations = []
    for product in product_ids:
        product_index = sanpham[sanpham['ten_sp'] == product].index[0]
        sim_scores = list(enumerate(cosine_sim[product_index]))
        sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
        content_based_recommendations.extend([sanpham.iloc[i[0]]['ten_sp'] for i in sim_scores[1:4]])  # 3 sản phẩm tương tự

    final_recommendations = list(set(collaborative_recommendations + content_based_recommendations))
    return final_recommendations