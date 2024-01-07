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
h2{
    background-color:DimGray;
    color:black;
    text-align:center;
    padding:1%
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

        </style>
    </head>
    <body>
        <h2>List of Orders</h2>
        <?php
            $con = mysqli_connect('localhost','root','','reataurantt');
            if(mysqli_connect_errno()){
                echo("Connection error");
            }
            else{
                $query = "SELECT * FROM orders";
                $result = mysqli_query($con,$query);

                if(mysqli_error($con)){
                    echo("Query Error");
                }
                else{
                    if(mysqli_num_rows($result)==0){
                        echo("<center>No orders yet!</center>");
                    }
                    else{
                        echo("
                        <table>
                        <tr><th>Sl no</th>
                        <th>Phone no</th>
                        <th>Cost</th>
                        <th>Status</th></tr>");
                        while($row = mysqli_fetch_assoc($result)){
                            echo("<tr><td>".$row['slno']."</td><td>".$row['phoneno']."</td><td>".$row['cost']."</td><td>
                            <button class='btn success'>Accept</button><button class='btn danger'>Reject</button></td></tr>");
                        }
                        echo("</table");
                    }
                }
            }