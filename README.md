# Python Mid-Course Project

This repository contains my mid-course project for the Python course.  
The project implements a simple **Flask REST API** with one endpoint `/orders` that supports basic CRUD operations.

---

## Features
- `GET /orders` → returns all orders  
- `POST /orders` → create a new order  
- `PUT /orders/<id>` → update an existing order  
- `DELETE /orders/<id>` → delete an order  

Example entity:
```json
{"id": 1, "item": "PS5"}

 ## Run Locally
# clone repository
git clone https://github.com/st369712/python-mid-project.git
cd python-mid-project

# create virtual environment
python3 -m venv .venv
source .venv/bin/activate

# install dependencies
pip install -r requirements.txt

# run app
python app.py

## Check
curl http://127.0.0.1:5000/orders

## Run with Docker (local build)
# build image
docker build -t python-mid-project:0.1 .

# run container
docker run --rm -p 5000:5000 python-mid-project:0.1

## Run with Docker (from Docker Hub)
docker run --rm -p 5000:5000 st369712/python-mid-project:0.1

## Example Requests
# get all orders
curl http://127.0.0.1:5000/orders

# create new order
curl -X POST http://127.0.0.1:5000/orders -H "Content-Type: application/json" -d '{"id":1,"item":"PS5"}'

# update order
curl -X PUT http://127.0.0.1:5000/orders/1 -H "Content-Type: application/json" -d '{"item":"Xbox Series X"}'

# delete order
curl -X DELETE http://127.0.0.1:5000/orders/1
