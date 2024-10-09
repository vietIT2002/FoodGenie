import pandas as pd
from collections import defaultdict
import random

# Function to recommend products based on customer ID
def recommend_products(customer_id, hoadon_df, cthoadon_df, sanpham_df, n_recommendations=18):
    # Filter orders for the customer
    customer_orders = hoadon_df[hoadon_df['id_khachhang'] == customer_id]
    
    # Filter products purchased based on the orders
    purchased_products = cthoadon_df[cthoadon_df['id_hoadon'].isin(customer_orders['id'])]
    
    # Count the number of purchases for each product
    product_count = defaultdict(int)
    for product_id in purchased_products['id_sanpham']:
        product_count[product_id] += 1
    
    # Get the product that the customer purchased the most
    if product_count:
        most_purchased_product_id = max(product_count, key=product_count.get)
    else:
        most_purchased_product_id = None
    
    # Get the list of categories for the products the customer has purchased
    purchased_product_categories = sanpham_df[sanpham_df['id'].isin(purchased_products['id_sanpham'])]['id_the_loai'].unique()
    
    # Store recommendations by category
    recommendations = []
    
    # Recommend products from each category
    for category in purchased_product_categories:
        # Get products in the same category that haven't been purchased
        category_products = sanpham_df[(sanpham_df['id_the_loai'] == category) & 
                                        (~sanpham_df['id'].isin(purchased_products['id_sanpham']))]
        
        # Randomly select products from the category
        if not category_products.empty:
            # Select a maximum of (n_recommendations / number of categories) from each category
            max_per_category = max(1, n_recommendations // len(purchased_product_categories))
            selected_products = category_products.sample(n=min(max_per_category, len(category_products)), random_state=random.randint(1, 100))['id'].tolist()
            recommendations.extend(selected_products)
    
    # Ensure that the total recommendations do not exceed the requested number
    recommendations = recommendations[:n_recommendations]
    
    return most_purchased_product_id, recommendations


