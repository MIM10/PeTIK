from flask import Flask, jsonify, request, render_template
from pymongo import MongoClient
from bson import ObjectId
import json, random, os

app = Flask(__name__)
# kalo di vercel
# client = MongoClient(os.environ.get('MONGODB_URI'))
# kalo di local
client = MongoClient("localhost", 27017)
db = client['produk_digital']
collection = db['products']

@app.route('/')
def index():
    products = sorted(collection.find(), key=lambda x: random.random())
    return render_template('index.html', products=products)

@app.route('/products')
def get_products():
    products = collection.find()
    return render_template('products.html', products=products)

@app.route('/api/products', methods=['GET'])
def get_api_products():
    products = []
    for product in collection.find():
        products.append({
            '_id': str(product['_id']),
            'name': product['name'],
            'description': product['description'],
            'image': product['image'],
            'price': product['price']
        })
    return jsonify({
        'total': len(products),
        'products': products
        } )

@app.route('/api/product/<id>', methods=['GET'])
def get_product(id):
    product = collection.find_one({'_id': ObjectId(id)})
    if product:
        return jsonify({
            '_id': str(product['_id']),
            'name': product['name'],
            'description': product['description'],
            'image': product['image'],
            'price': product['price']
        })
    else:
        return jsonify({'error': 'Product not found'})

@app.route('/api/products', methods=['POST'])
def add_product():
    product = {
        'name': request.json['name'],
        'description': request.json['desc'],
        'image': request.json['img'],
        'price': request.json['price']
    }
    result = collection.insert_one(product)
    new_product = collection.find_one({'_id': result.inserted_id})
    return jsonify({
        'message': 'Product added',
        'product': {
            '_id': str(new_product['_id']),
            'name': new_product['name'],
            'description': new_product['description'],
            'image': new_product['image'],
            'price': new_product['price']
        }
    })

@app.route('/api/product/<id>', methods=['PUT'])
def update_product(id):
    product = collection.find_one({'_id': ObjectId(id)})
    if product:
        collection.update_one({'_id': ObjectId(id)}, {'$set': {
            'name': request.json['name'],
            'description': request.json['desc'],
            'image': request.json['img'],
            'price': request.json['price']
        }})
        updated_product = collection.find_one({'_id': ObjectId(id)})
        return jsonify({
            'message': 'Product updated',
            'product': {
                '_id': str(updated_product['_id']),
                'name': updated_product['name'],
                'description': updated_product['description'],
                'image': updated_product['image'],
                'price': updated_product['price']
            }
        })
    else:
        return jsonify({'error': 'Product not found'})

@app.route('/api/product/<id>', methods=['DELETE'])
def delete_product(id):
    result = collection.delete_one({'_id': ObjectId(id)})
    if result.deleted_count == 1:
        return jsonify({'message': 'Product deleted'})
    else:
        return jsonify({'error': 'Product not found'})

if __name__ == '__main__':
    app.run(debug=True)