<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new order</title>
    <style>
        body {
            background-color:rgba(4, 81, 247, 0.555)
        }
        *{
            box-sizing: border-box;
            
        }
        .Main {
            padding: 15px;
            border-radius: 15px;
            font-family: Arial, Helvetica, sans-serif;
            max-width: 50%;
            background-color: rgb(214, 208, 208);
            margin: auto;
        }
        .tbl{
            text-align: right;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }
        .Info {
            text-align: center;
        }
        .span-2 {
            grid-column: span 2;
        }
        .span-3 {
            grid-column: span 3;
        }
        .span-1 {
            grid-column: span 1;
        }
        .Res {
            font-size: 1em;
            text-align: center;
            color: black;
            max-width:10000px;
            margin: auto;
            
        }
        .Head{
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            background-color: white;
        }
        .HdR {
            text-align: right;
            backface-visibility: hidden;
        }
        .HdC {
            text-align: center;
        }
        .HdL {
            text-align: left;
        }
        .Cent{
            margin: auto;
        }
        .btn {
            display: inline-block;
            margin-bottom: 0;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .Menubtn {
            margin: 15%;
        }
        .biggerAnswer {
            height: 3em;
        }
        .header {
            display: flex;
            justify-content: center;  
            align-items: flex-start;  
            margin: 0;
            padding: 20px 40px;
            border: 2px solid orange; 
            font-size: 36px; 
            font-family: Arial, sans-serif;
            text-align: center;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('orderForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // get form data
                const formData = new FormData(this);

                // Prepare data for the POST request
                const data = {
                    id: formData.get('id'),
                    item: formData.get('item'),
                    qty: formData.get('qty')
                };

                // Send HTTP POST request using fetch
                fetch('http://localhost:5000/orders', {
                    method: 'POST',
                    body: JSON.stringify(data) 
                })
                .then(response => response.json())  // Parse the JSON response
                .then(data => {
                    // Handle response data if needed
                    console.log('Success:', data);
                    alert('נקלט בהצלחה');
                })
                .catch(error => {
                    // Handle errors if any
                    console.error('Error:', error);
                    alert('נקלט בהצלחה');
                });
            });
        });
    </script>
</head>
<body>
    <div class="header">
        Open orders
    </div>
    
    <div class="Main tbl">
        <form id ="orderForm" class="Cent span-3" action="Home.php">
            <table>
            <tr>
                    <td>
                        <Input Class="Res" type="number" name="id" id="id" required>
                    </td>
                    <td>
                        <label>:מספר הזמנה</label>
                    </td>
                </tr>    
                <tr>
                    <td>
                        <Input Class="Res" type="text" name="item" id="item" required>
                    </td>
                    <td>
                        <label>:שם פריט</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Input Class="Res" type="number" name="qty" id="qty" pattern="[1-999]" required>
                    </td>
                    <td>
                        <label>:כמות</label>
                    </td>
                </tr>
            </table>
            <input class="btn" type="submit" value="הוסף" />
            <!-- <input class="btn" type="button" value="חזור ללא שמירה" onclick="history.back()" /> -->
        </form>
    </div>
</body>
</html>