<?php
//declare parameters

// ONLINE DB
// define("SERVER", "sql310.epizy.com");
// define("USERNAME", "epiz_34032191");
// define("PASSWORD", "X0EP3VIKZjh");
// define("DATABASE", "epiz_34032191_dishtasker_db");

// offline DB
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "dishtasker_db");

//create a connection object
$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

if ($conn->connect_error) {
    echo "Could not connect to the server";
}

// Check Connection

// else {
//     echo "Connected na sa crud_demo boy";
// }
