import time, subprocess, os, signal, requests

BASE_URL = "http://localhost:5000"  # Change if your app runs on a different port
TEST_ORDER = {
    "id": 999,
    "item": "Test Holiday",
    "quantity": 1
}

def wait_for_server(url, timeout=10):
    start = time.time()
    while time.time() - start < timeout:
        try:
            r = requests.get(url, timeout=1)
            if r.status_code == 200:
                return True
        except requests.RequestException:
            pass
        time.sleep(0.5)
    return False

def test_orders_endpoint():
    # מרימים את האפליקציה (בלי reloader)
    p = subprocess.Popen(["python", "app.py"])
    try:
        assert wait_for_server("http://127.0.0.1:5000/orders", timeout=15)
    finally:
        # סגירה נקייה של התהליך
        try:
            p.terminate()
            p.wait(timeout=3)
        except Exception:
            os.kill(p.pid, signal.SIGKILL)

def test_full_order_flow():
    # Step 1: Get all orders
    res = requests.get(f"{BASE_URL}/orders")
    assert res.status_code == 200
    print("Step 1: GET /orders -> 200 OK")

    # Step 2: Add a new order
    res = requests.post(f"{BASE_URL}/orders", json=TEST_ORDER)
    assert res.status_code in [200, 201]
    print("Step 2: POST /orders -> Order added")

    # Step 3: Get all orders and verify the new one is there
    res = requests.get(f"{BASE_URL}/orders")
    assert res.status_code == 200
    orders = res.json()
    assert any(order['id'] == TEST_ORDER['id'] for order in orders)
    print("Step 3: GET /orders -> Order found")

    # Step 4: Delete the order
    res = requests.delete(f"{BASE_URL}/orders/{TEST_ORDER['id']}")
    assert res.status_code == 200
    print("Step 4: DELETE /orders/999 -> Deleted")

    # Step 5: Get all orders again and verify it's gone
    res = requests.get(f"{BASE_URL}/orders")
    assert res.status_code == 200
    orders = res.json()
    assert not any(order['id'] == TEST_ORDER['id'] for order in orders)
    print("Step 5: GET /orders -> Order deleted successfully")