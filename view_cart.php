<html>
    <head>
        <title> My Cart </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body{
               
            }
            tr,td,th{
                text-align:center;
                border:1px solid black;

            }
            .tcont{
                padding:3%;
            }
            table{
                margin-top:5%;
                table-layout:fixed;
                padding:2%;
            }
            h4{
                background-color:black;
                color:white;
                text-align:center;
                padding:1%;
            }
            pre{
                font-size:18px;
            }
        </style>
    </head>
    <body>
        <h4> My Added Items </h4>
        <?php
            session_start();
            $phno = $_SESSION['phoneNo'];

            $con = mysqli_connect('localhost','root','','reataurantt');

            if(mysqli_connect_errno()){
                echo("Connection Error");
                exit();
            }
            else{
                $query = "SELECT * FROM cart WHERE phoneno = '$phno'";
                $result = mysqli_query($con,$query);
                if($result!=false){
                    if(mysqli_num_rows($result)==0){
                    echo("<center>No items yet</center>");
                }
                else{
                    echo("<div class='tcont'><table class='table'>
                    <thead class='thead-dark'>
                    <tr><th>Food Id </th>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Price</th><th></th></thead></tr><tbody>");
                    $cost = 0.00;
                    while($row=mysqli_fetch_assoc($result)){
                        echo("<tr><td>".$row['foodId']."</td><td>".$row['foodname']."</td><td>".$row['qty']."</td><td>".$row['price']."</td><td><button class='btn' onclick='deleteFood(".$row['foodId'].")'><i class='fa fa-trash'></i></button></td></tr></tbody>");
                        $cost+=$row['price'];
                    }
                    echo("</table>");
                    echo("<div><pre>Total Price to be paid:".$cost."</pre</div>");
                    echo("<div><button type='button' onclick='submiit()'>Place order</button></div></div>");
                }
            }
            else{
                echo("Not selected");
            }
        }
            ?>
        </body>
        <script>
            function deleteFood(id){

                var data = new FormData();

                data.append("phoneNo",<?php echo $phno ?>);

                data.append("foodId",id);

                fetch("delete.php",
                {
                    method:"POST",
                    body:data,
                })
                location.reload();
            }

            function submiit(){
                alert("Heyy");
                var ph = <?php echo $phno ?>;
                const date = new Date();

// Get individual components
const year = String(date.getFullYear());
const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
const day = String(date.getDate()).padStart(2, '0'); // Day of the month
const hours = String(date.getHours()).padStart(2, '0'); // Hours (0-23)
const minutes = String(date.getMinutes()).padStart(2, '0'); // Minutes
const seconds = String(date.getSeconds()).padStart(2, '0'); // Seconds

// Construct MySQL date string
const mysqlDateString = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;



                var cost = <?php echo $cost ?>;
                 var data = new FormData();
                 data.append("phoneNo",ph);
                 data.append("Date",mysqlDateString);
                 data.append("Cost",cost);
                 fetch("order.php",{
                    method:"POST",
                    body:data,
                 })
                 .then(res=>res.text())
                 .then(text=>alert(text));
            }
        </script>
    </html>
