<html>
    <head>
        <title>Orders</title>
        <style>
            table{
                border-collapse:collapse;
                margin:5%;
                width:90%;
            }
            tr,td,th{
                border:2px dotted black;
                text-align:center;
                padding:1%;
            }
            .btn {
    border: none;
    background-color: inherit;
    font-size: 14px;
    cursor: pointer;
    display: inline-block;
}
.success {
    color: green;
}

.success:hover {
    background-color: #04AA6D;
    color: white;
}
.danger {
    color: red;
}

.danger:hover {
    background: #f44336;
    color: white;
}
h2{
    background-color:DimGray;
    color:black;
    text-align:center;
    padding:1%
}
        </style>
    </head>
    <body>
        <h2>Bookings Done</h2>
        <?php
            $con = mysqli_connect('localhost','root','','reataurantt');
            session_start();
            $phno = $_SESSION['phoneNo'];
            if(mysqli_connect_errno()){
                echo("Connection error");
            }
            else{
                $query = "SELECT naam,phoneno,datee,SUM(seats) FROM bookings WHERE confirmation='0' GROUP BY phoneNo ";
                $result = mysqli_query($con,$query);

                if(mysqli_error($con)){
                    echo(mysqli_error($con));
                }
                else{
                    if(mysqli_num_rows($result)==0){
                        echo("<center>No orders yet!</center>");
                    }
                    else{
                        
                        echo("
                        <table>
                        <tr><th>Name</th>
                        <th>Phone no</th>
                        <th>Seats</th>
                        <th>Date</th>
                        <th>Confirmation Status</th></tr>");
                        while($row = mysqli_fetch_assoc($result)){
                            echo("<tr><td>".$row['naam']."</td><td>".$row['phoneno']."</td><td>".$row['SUM(seats)']."</td><td>".$row['datee']."</td><td><button type='button' onclick='confirm(".$row['phoneno'].")'>Confirm</button></td></tr>");
                        }
                        echo("</table");
                    }
                }
            }
                ?>
                                    </body>
                                    <script>
                    function confirm(phno){
                        var data = new FormData();
                        data.append("phno",phno);
                        alert("Going in");
                        fetch("confirm.php",{
                            method:"POST",
                            body:data,
                        }).then(res=>res.text())
                        .then(txt=>alert(txt));
                        alert("Going in 1");

                    }
                    </script>
        </html>
