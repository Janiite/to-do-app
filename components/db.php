<?php

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "to-do-list";

    //conection to server

    $conn = mysqli_connect($servername, $username, $pass, $dbname);

    // check conection

    if (!$conn) {
        die("Error:" . mysqli_connect_error());
    }