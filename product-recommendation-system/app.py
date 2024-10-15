import pandas as pd
from flask import Flask, jsonify
from models.recommender import get_hybrid_recommendations

app = Flask(__name__)

@app.route('/recommendations/<int:user_id>', methods=['GET'])
def recommend_products(user_id):
    try:
        recommendations = get_hybrid_recommendations(user_id)
        return jsonify({'recommendations': recommendations})
    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)
