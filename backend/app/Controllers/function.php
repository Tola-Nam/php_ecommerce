<?php
// coonnection database file
include '../../routes/database-conncetion.php';
// function for register account
function registerUser()
{
    global $database_connection;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_pass = $_POST['confirm_pass'];
        $gender = $_POST['gender'];

        if (empty($user_name) || empty($email) || empty($password) || empty($confirm_pass) || empty($gender)) {

            header('Location: http://localhost/full_stack/backend/app//Models/index.php?status=empty');

        } else {
            if ($password != $confirm_pass || strlen($password) < 8 || strlen($confirm_pass) < 8) {
                header("Location: http://localhost/full_stack/backend/app//Models/index.php?message=Password does not match or password length is less than 8 characters");
            } else {
                // Encryp password before saving in database
                $password = md5($password);
                // $confirm_pass = md5($confirm_pass);
                $conn = database_connection();
                $sqlQuery = "INSERT INTO users (`user_name`,`email`,`password`,`Gender`)
                        VALUES ('$user_name','$email','$password','$gender')";

                try {
                    $query = $conn->query($sqlQuery);
                    if (!$query) {
                        throw new Exception("Email already used!!! Please try another email");
                    }
                } catch (Exception $e) {
                    header('Location: http://localhost/full_stack/backend/app//Models/index.php');
                }
                header("Location: ./dashboardpage.php?message=success");
            }
        }
    }
}
// function for add product 
function addproduct()
{
    global $database_connection;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // print_r($_POST);
    }
}
addproduct();

// function for chance image to name image
function fileuploader($sourcefile): string
{
    $filename = rand(0, 9999999) . date('y - m - d - h - i - s') . '.' . pathinfo($sourcefile['name'], PATHINFO_EXTENSION);
    move_uploaded_file($sourcefile['tmp_name'], '../Asset/' . $filename);
    return $filename;
}

function formuploadprofile()
{
    global $connection;
    $author_id = $_SESSION['staff_id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $bio = isset($_POST['bio']) ? trim($_POST['bio']) : '';
        $filename = "default.png"; // Default profile picture

        // Handle file upload
        if (!empty($_FILES['user_profile']['name']) && $_FILES['user_profile']['error'] == 0) {
            $filename = fileuploader($_FILES['user_profile']);
        }

        // Ensure bio is not empty
        if (!empty($bio)) {
            $insertQuery = "INSERT INTO `users_profile`(`user_profile`, `bio`,`author_id`)
            VALUES ('$filename', '$bio','$author_id')";
            $query = database_connection()->query($insertQuery);

            if ($query) {
                header("Location: dashboardpage.php?status=success");
            } else {
                header("Location: dashboardpage.php?status=fail");
            }
        } else {
            header("Location: dashboardpage.php?status=fail");
        }
    }
}
formuploadprofile();
?>