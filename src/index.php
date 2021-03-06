<?php

    $servername = "mariadb";
    $username = getenv('MYSQL_USER');
    $password = getenv('MYSQL_PASSWORD');

    $dbname = getenv('MYSQL_DATABASE');

    echo "servername: $servername, username:$username, password:$password, dbname:$dbname";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    
    phpinfo();
?>