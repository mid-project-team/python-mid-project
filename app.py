from flask import Flask, request, jsonify

app = Flask(__name__)
orders = []

@app.get("/orders")
def get_orders():
    return jsonify(orders), 200

@app.post("/orders")
def create_order():
    data = request.get_json(force=True, silent=True) or {}
    orders.append(data)
    return jsonify({"status": "created", "order": data}), 201

@app.put("/orders/<int:order_id>")
def update_order(order_id):
    data = request.get_json(force=True, silent=True) or {}
    for order in orders:
        if order.get("id") == order_id:
            order.update(data)
            return jsonify({"status": "updated", "order": order}), 200
    return jsonify({"error": "order not found"}), 404

@app.delete("/orders/<int:order_id>")
def delete_order(order_id):
    global orders
    orders = [o for o in orders if o.get("id") != order_id]
    return jsonify({"status": "deleted", "id": order_id}), 200

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=False, use_reloader=False)

