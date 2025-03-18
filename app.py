from flask import Flask, jsonify
import os

app = Flask(__name__)

@app.route('/')
def hello_world():
    return 'Hello, World!'
    
@app.route('/api/greeting')
def greeting():
    return jsonify({"message": "Hello, User!"})

@app.route('/api/baked_goods')
def list_baked_goods():
    public_folder = 'public'
    try:
        files = os.listdir(public_folder)
        return jsonify({"baked_goods": files})
    except FileNotFoundError:
        return jsonify({"error": "Public folder not found"}), 404




if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')