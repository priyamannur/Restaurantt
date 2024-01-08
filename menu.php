<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
   
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
    tr,td,th{
        text-align:center;
    }
    .card {
            margin: 10px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            z-index: 1;
        }
        button{
            margin-top:5px;
        }

</style>
</head>
<body>
    <div class="header">
        Welcome to Resto!!
    </div>
    <ul class="navbarr">
        <li><a href="view_cart.php">View Cart </a></li>
        <li><a href="tableBooking.php">Book Tables</a></li>
        <li><a href="profile.php">About Us</a></li>  
    </ul>
<div class="container">
    <div class="row">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'reataurantt');
        if (mysqli_connect_errno()) {
            echo("SQL connections failed");
        } else {
            $query = "SELECT * FROM fooditems ORDER BY slno";
            $result = mysqli_query($con, $query);
            if (mysqli_error($con)) {
                print("Query error");
                exit();
            }
            if ($result != false) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                   echo '<div class="col-md-3">';
                   echo '<div class="card">';
                    echo '<img src="images/' . $row['image'] . '" height="150px" class="card-img-top" alt="' . $row['food'] . '">';
                    echo '<input type="hidden" id="img' . $i . '" value="' . $row['image'] . '"/>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['slno'] . '</h5>';
                    echo '<h5 class="card-title">' . $row['food'] . '</h5>';
                    echo '<p class="card-text">Price: ' . $row['price'] . '</p>';
                    echo '<input type="hidden" id="food'.$i.'" value="' . $row['food'].'"/>';
                    echo '<input type="hidden" id="price'.$i.'" value="' . $row['price'].'"/>';
                    echo '<input type="hidden" id="slno'.$i.'" value="' . $row['slno'].'"/>';
                    echo '<input type="number" min="0" step="1" class="form-control" placeholder="Quantity" id="qty' . $i . '"/>';
                    echo '<button type="button" class="btn btn-dark" onclick="addToCart(' . $i . ')">Add to Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    $i++;
                }
            } else {
                echo("<center>No items Available</center>");
            }
        }
        ?>
    </div>
</div>
</body>
<script>
    function addToCart(i) {
        var data = new FormData();
        var foodId = document.getElementById('slno'+i).value;
        var foodName = document.getElementById('food'+i).value;
        var qty = document.getElementById('qty'+i).value;
        var price = document.getElementById('price'+i).value;
      

        data.append("foodId", foodId);
        data.append("foodName", foodName);
        data.append("qty", qty);
        data.append("price", price);

        fetch("cart.php", {
            method: "POST",
            body: data,
        }).then(res => res.text())
            .then(txt => alert(txt));
    }
</script>
</html>
