<?php
// function for deleted product
function deletedProduct()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['code'])) {

            $code = $_POST['code'];

            $deletedQuery = " DELETE FROM `products` WHERE `code` = '$code';";

            database_connection()->query($deletedQuery);
        }
    }
}
deletedProduct();
?>