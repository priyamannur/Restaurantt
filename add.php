<?php
    $con = mysqli_connect('localhost','root','','reataurantt');
    if(mysqli_connect_errno()){
        echo("Connection Error");
    }
    else{
        $name = $_POST['foodname'];
        $foodid = $_POST['foodId'];
        $img = $_POST['img'];
        $price = $_POST['price'];
        $query = "INSERT INTO fooditems VALUES('$foodid','$name','$img','$price')";
        $result = mysqli_query($con,$query);
        if(mysqli_error($con)){
            echo("Query Error");
        }
        else{
            echo("Successfully Added!");
        }
    }
    ?>