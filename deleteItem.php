<?php
    $id = $_POST['foodId'];

    $con = mysqli_connect('localhost','root','','reataurantt');

    if(mysqli_connect_errno()){
        echo("Sql error");
    }
    else{
        $query  = "DELETE FROM fooditems WHERE slno='$id'";

        $result = mysqli_query($con,$query);
        if(mysqli_error($con)){
            echo("Query Error");
        }
    }
    ?>