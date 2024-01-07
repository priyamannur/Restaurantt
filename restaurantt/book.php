<?php
    $con = mysqli_connect('localhost','root','','reataurantt');
    if(mysqli_connect_errno()){
        echo("Connection Error");
    }
    else{
        $name = $_POST['name'];
        $phno = $_POST['phno'];
        $seats = $_POST['nums'];
        $date = $_POST['date'];
        $time = $_POST['t1'];
        $datetime = $date.' '.$time; 
        $query = "INSERT INTO bookings VALUES('$name','$phno','$datetime','$seats')";
        $result = mysqli_query($con,$query);
        if(mysqli_error($con)){
            echo("Query Error");
        }
        else{
            echo("Requested the booking, Thank you!");
        }
    }
    ?>