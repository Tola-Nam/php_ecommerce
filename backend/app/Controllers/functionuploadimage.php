<?php
require_once('../Controllers/functoinupload.php');
// function for add product 
function addproduct()
{
    global $database_connection;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // print_r($_POST);
        $authior_id = $_SESSION['staff_id'];
        $title = $_POST['title'];
        $regular_price = $_POST['regular_price'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $product_detail = $_POST['product_detail'];
        $category = $_POST['category'];
        $sourcefile = $_FILES['Thumbnail'];
        $filename = imageuploader($sourcefile);

        // echo $title . $regular_price . $size . $color . $product_detail;
        if (empty($title) || empty($regular_price) || empty($size) || empty($color) || empty($product_detail)) {
            header("Location: dashboardpage.php");
        } else {
            $InsertQuery = "INSERT INTO `products` (`title`,`regular_price`,`size`,`color`,`product_detail`,`author_id`,`Thumbnail`,`category`)
                         VALUES('$title','$regular_price','$size','$color','$product_detail','$authior_id','$filename','$category');";
            // echo $InsertQuery;
            try {
                $result = database_connection()->query($InsertQuery);
                $message = "success";
            } catch (mysqli_sql_exception $e) {
                $message = "fail";
            }
        }
    }
}
addproduct();
?>