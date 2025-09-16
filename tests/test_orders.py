import time, subprocess, os, signal, requests

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

