from flask import Flask, jsonify
from recommendation_engine import recommend_products
from database import load_data

app = Flask(__name__)

# Load data from the database
khachhang_df, sanpham_df, hoadon_df, cthoadon_df, theloai_df = load_data()

# API endpoint to get product recommendations for a customer
@app.route('/recommend/<int:customer_id>', methods=['GET'])
def get_recommendations(customer_id):
    # Call the product recommendation function with the customer ID
    most_purchased_product_id, recommendations = recommend_products(customer_id, hoadon_df, cthoadon_df, sanpham_df)
    
    result = {
        'most_purchased': None,
        'recommendations': []
    }
    
    # Get information of the most purchased product
    if most_purchased_product_id:
        most_purchased_product_info = sanpham_df[sanpham_df['id'] == most_purchased_product_id]
        result['most_purchased'] = {
            'product_id': int(most_purchased_product_info['id'].values[0]),  # Ensure integer type
            'product_name': most_purchased_product_info['ten_sp'].values[0],
            'price': float(most_purchased_product_info['don_gia'].values[0]),  # Ensure float type
            'image': most_purchased_product_info['hinh_anh'].values[0],
            'original_price': float(most_purchased_product_info['gia_goc'].values[0]),  # Giá gốc
            'sold_quantity': int(most_purchased_product_info['sl_da_ban'].values[0])  # Số lượng đã bán
        }
    
    # Create a list of product information for similar products
    for product_id in recommendations:
        product_info = sanpham_df[sanpham_df['id'] == product_id]
        result['recommendations'].append({
            'product_id': int(product_info['id'].values[0]),  # Ensure integer type
            'product_name': product_info['ten_sp'].values[0],
            'price': float(product_info['don_gia'].values[0]),  # Ensure float type
            'image': product_info['hinh_anh'].values[0],
            'original_price': float(product_info['gia_goc'].values[0]),  # Giá gốc
            'sold_quantity': int(product_info['sl_da_ban'].values[0])  # Số lượng đã bán
        })
    
    # Return the result as JSON
    return jsonify(result)

if __name__ == '__main__':
    # Run the Flask application in debug mode
    app.run(debug=True)




