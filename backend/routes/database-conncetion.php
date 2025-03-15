<?php

function database_connection(): mysqli
{
    return new mysqli('localhost', 'root', '', 'product_management_system');
}

// $conn = database_connection();


// if ($conn) {
//     echo ' Database conncetion successfull';
// } else {
//     echo ' Database connection failed!!!';
// }

?>