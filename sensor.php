<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="refresh" content="1"; url="<?php echo $_SERVER['PHP_SELF']; ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width , initial-scale=1.0">
        <title>Table</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body style="margin: 50px;">
        <h1> Sensor data</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Account No</th>
                    <th>Voltage</th>
                    <th>Current</th>
                    <th>Power</th>
                    <th>Energy</th>
                    <th>Frequency</th>
                    <th>PF</th>
                    <th>Date</th>
                    <th>time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "pasindu";
                    $password = "1234";
                    $database = "eleccare";

                    $connection = new mysqli($servername , $username , $password, $database);

                    if ($connection -> connect_error){
                        die("connect failed:" .$connection -> connect_error);
                    }

                    $sql = "SELECT * FROM elec_usage ORDER BY date DESC, time DESC LIMIT 10";
                    $result = $connection -> query($sql);

                    if(!$result){
                        die("Invalid query:" .$connection ->error);
                    }

                    while($row = $result -> fetch_assoc()){
                        echo "<tr>
                            <td>" . $row["account_no"] ."</td>
                            <td>" . $row["voltage"] ."</td>
                            <td>" . $row["current"] ."</td>
                            <td>" . $row["power"] ."</td>
                            <td>" . $row["energy"] ."</td>
                            <td>" . $row["frequency"] ."</td>
                            <td>" . $row["pf"] ."</td>
                            <td>" . $row["date"] ."</td>
                            <td>" . $row["time"] ."</td>
                        </tr>";
                    }

                
            ?>
            </tbody>
        </table>
    </body>
</html>