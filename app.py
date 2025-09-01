from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/orders', methods=['GET'])
def get_orders():
    return jsonify({"message": "Here are the orders!"})

@app.route('/orders', methods=['POST'])
def create_order():
    data = request.json
    return jsonify({"message": "Order created!", "order": data})

if __name__ == '__main__':
    app.run(debug=True)
