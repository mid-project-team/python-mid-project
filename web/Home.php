<?php
// Get JSON data from a URL
$url = "http://localhost:5000/orders"; 
$json_data = file_get_contents($url);

if ($json_data != "") {
    // Decode the JSON response
    $data = json_decode($json_data, true); 

    $strT = "";
    // Loop the data to generate HTML table
    foreach ($data as $item) {
        $strT = $strT . "<tr>";
        $strT = $strT . "<td>" . htmlspecialchars($item['id']) . "</td>";
        $strT = $strT . "<td>" . htmlspecialchars($item['item']) . "</td>";
        $strT = $strT . "<td>" . htmlspecialchars($item['qty']) . "</td>";
        $strT = $strT . "</tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order your holiday</title>
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
</head>
<body>
    <div class="header">
        Open orders
    </div>
    <div class="Main tbl">
        <table id="ordersTable" Class="Res">
            <tr>
                <td>מספר הזמנה</td>
                <td>פריט</td>
                <td>כמות</td>
            </tr>
            <?Php echo $strT; ?>
        </table>
    </div>
    <button class="btn Menubtn" onclick="window.location.href='insertOrder.php';">new Order</button >
</body>
</html>