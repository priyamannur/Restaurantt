<?php
    $phno = $_POST['phoneNo'];
    $id = $_POST['foodId'];

    $con = mysqli_connect('localhost','root','','reataurantt');

    if(mysqli_connect_errno()){
        echo("Sql error");
    }
    else{
        $query  = "DELETE FROM cart WHERE phoneno='$phno' AND foodId='$id'";

        $result = mysqli_query($con,$query);
        if(mysqli_error($con)){
            echo("Query Error");
        }
    }
    ?>