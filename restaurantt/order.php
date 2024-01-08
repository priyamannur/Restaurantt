<?php

    $phno = $_POST['phoneNo'];
    $date = $_POST['Date'];
    $cost = $_POST['Cost'];


    $con = mysqli_connect('localhost','root','','reataurantt');

    if(mysqli_connect_errno()){
        echo("Connection error");
    }
    else{
        
        $query = "INSERT INTO orders (`phoneno`, `or_date`, `cost`) VALUES ('$phno', NOW(), '$cost')";
        $result = mysqli_query($con,$query);

        if(mysqli_error($con)){
            echo("Query Error".mysqli_error($con));
        }
        else{
            echo("Order Placed,Waiting for order to get accpted");
        }
    }
    ?>

