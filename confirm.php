<?php
    $con = mysqli_connect('localhost','root','','reataurantt');

    if(!$con){
        echo("Connection Error");
    }
    else{
        $phno = $_POST['phno'];
        $query = "UPDATE bookings SET confirmation= '1' WHERE phoneno='$phno'";
        
        $result = mysqli_query($con,$query);

        if($result!=false){
            if(mysqli_affected_rows($con)>0)
            echo("Seat confirmed!");
        }
        else{
            echo("Query Error");
        }

    }
    ?>