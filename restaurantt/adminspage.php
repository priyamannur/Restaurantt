<html>
    <head>
        <title>Profile</title>
        
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
    
    th,tr,td{
        text-align:center;
    }
    .header{
        background-color:black;
        color:white;
        text-align:center;
        display:block;
        padding:2%;
    }
    ul{
        overflow:hidden;
        list-style-type: none;   
        width:100%;  
        background-color:grey;
    }

    .navbarr li{
        float:left;
    }
    .navbarr a{
        color:white;
        text-decoration:none;
        display: inline-block; 
        padding: 10px 15px; 
    }
    .navbarr a:hover{
        background-color:DimGray;
        color:black;
    }


</style>
</head>
<body>
    <div class="header">
        Welcome Admin!!
    </div>
    <ul class="navbarr">
        <li><a href="orderPage.php">View Orders</a></li>
        <li><a href="view_tables.php">Booked Tables</a></li>
        <li><a href="addmenu.php">Add to Menu</a></li>
    </ul>
    <?php

        $con =mysqli_connect('localhost','root','','reataurantt');
         if(mysqli_connect_errno()){
            echo("SQL connections failed");
         }
         else{

            echo("<div><h2>Current Menu</h2></div>");
            echo("<table class='table'>
            <thead><tr><th>Food Id</th><th>Food Item</th><th>Images</th><th>Price</th><th></th></tr></thead>");
            $query= "SELECT * FROM fooditems ";
            $result = mysqli_query($con,$query);
            if(mysqli_error($con)){
                print("Query error");
                exit();
            }
            if($result!=false){
                $i= 1;
            while($row = mysqli_fetch_assoc($result)){
                echo("<tbody><tr><td id='slno{$i}'>".$row['slno'].
                "</td><td id='food{$i}'>".$row['food']."</td>
                
                <td><image src='images/{$row['image']}' width='140' height='90' id='img{$i}'/></td>
                <td id='price{$i}'>".$row['price']."</td><td><button type='button' onclick='deleteItem(".$row['slno'].")'>Delete Item</button></td></tr></tbody>");
                $i++;
            }
            echo("</table>");
            }
        else{
            echo("<centre> No items Available</center>");
        }
    }
         ?>
        </body>
        <script>
        function deleteItem(id){

            var data = new FormData();

            data.append("foodId",id);

                fetch("deleteItem.php",
                    {
                        method:"POST",
                        body:data,
                    })
                    .then(res=>res.text())
                    .then(txt=>alert(txt));
                  location.reload(); 
                }
</script>
    </html>
