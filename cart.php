<?php
    session_start();

    $phno = $_SESSION['phoneNo'];


    $con = mysqli_connect('localhost','root','','reataurantt');

    if(mysqli_connect_errno()){
        echo("SQL error");

    }
    else{
       
        $foodId = $_POST['foodId'];//int
        $foodname = $_POST['foodName'];//string
        $qty = $_POST['qty'];
        $qtydeci = floatval($qty);//decimal

        $pricee = $_POST['price'];

        $floatprice = floatval($pricee)*$qtydeci;//decimal



        $query = "INSERT INTO cart VALUES('$phno','$foodId','$foodname','$qty','$floatprice')";

        
        
        $result = mysqli_query($con,$query);

        if(mysqli_error($con)){
         echo("Query Error");
           
        }
        else{
           echo("Item Added");
        }

    }
    ?>