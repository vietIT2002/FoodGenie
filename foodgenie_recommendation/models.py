# models.py

# Import necessary libraries
import pandas as pd
import numpy as np
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import pymysql
from flask import Flask, jsonify, request

# Content-Based Filtering Model for Product Recommendations

# This model uses content-based filtering to recommend products based on product features.
# Content-based filtering suggests items similar to those a user has shown interest in, based on item attributes.

# Libraries:
# - pandas: For data manipulation and analysis.
# - numpy: For numerical operations.
# - sklearn: For machine learning utilities, including TF-IDF vectorization and cosine similarity.
# - pymysql: For connecting to MySQL database and executing queries.
# - Flask: For creating the REST API.

# Function to load data from MySQL database
def load_data():
    # Connect to the MySQL database
    connection = pymysql.connect(
        host='localhost',
        user='root',
        password='',
        database='foodgennie'
    )
    
    # Load product data into DataFrame
    sanpham_df = pd.read_sql('SELECT * FROM sanpham', connection)
    
    # Close the connection
    connection.close()
    
    return sanpham_df

# Function to create a content-based filtering recommendation model
def content_based_recommendations(product_id, n_recommendations=5):
    # Load product data
    sanpham_df = load_data()
    
    # Define the TF-IDF Vectorizer
    tfidf_vectorizer = TfidfVectorizer(stop_words='english')
    
    # Fit the model and transform the 'noi_dung' (content) column
    tfidf_matrix = tfidf_vectorizer.fit_transform(sanpham_df['noi_dung'])
    
    # Calculate cosine similarity between products
    cosine_sim = cosine_similarity(tfidf_matrix, tfidf_matrix)
    
    # Get the index of the product that matches the product_id
    idx = sanpham_df.index[sanpham_df['id'] == product_id].tolist()[0]
    
    # Get the pairwise similarity scores for all products with the product
    sim_scores = list(enumerate(cosine_sim[idx]))
    
    # Sort the products based on similarity scores
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    
    # Get the scores of the n most similar products
    sim_scores = sim_scores[1:n_recommendations+1]
    
    # Get the product indices
    product_indices = [i[0] for i in sim_scores]
    
    # Return recommended product details
    recommended_products = sanpham_df.iloc[product_indices]
    
    return recommended_products[['id', 'ten_sp', 'don_gia', 'hinh_anh']]

# Create Flask app
app = Flask(__name__)

# API endpoint to get product recommendations
@app.route('/api/recommendations/<int:product_id>', methods=['GET'])
def get_recommendations(product_id):
    n_recommendations = request.args.get('n', default=5, type=int)  # Number of recommendations from query parameter
    try:
        recommended_products = content_based_recommendations(product_id, n_recommendations)
        result = {
            'recommendations': recommended_products.to_dict(orient='records')  # Convert DataFrame to list of dictionaries
        }
        return jsonify(result), 200  # Return the result as JSON with HTTP 200 status code
    except Exception as e:
        return jsonify({'error': str(e)}), 500  # Return error message with HTTP 500 status code

# Instructions to run the code:
# 1. Ensure you have the required libraries installed. You can install them using pip:
#    pip install pandas numpy scikit-learn pymysql flask
# 2. Make sure your MySQL server is running and accessible with the provided credentials.
# 3. Ensure that the 'noi_dung' column in your 'sanpham' table contains meaningful product descriptions.
# 4. Run this script in your Python environment to start the Flask server.
# 5. Call the API endpoint to get recommended products.
# 
# Example usage of the API:
# 1. Start the Flask server by running:
#    python models.py
# 2. Open your web browser or a tool like Postman and navigate to:
#    http://127.0.0.1:5000/api/recommendations/1?n=5
#    Replace '1' with the ID of the product you want recommendations for.
#    The query parameter 'n' can be used to specify the number of recommendations (default is 5).
# 
# Example usage of the recommendation function:
# recommended_products = content_based_recommendations(product_id=1, n_recommendations=5)
# print(recommended_products)

if __name__ == '__main__':
    # Run the Flask application in debug mode
    app.run(debug=True)
