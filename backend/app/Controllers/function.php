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
// function get product detail

function getproduct()
{
    global $database_connection;

    if (isset($_SERVER['REQUEST_METHOD'])) {
        $author_id = $_SESSION['staff_id'];
        $selectQuery = "SELECT * FROM `products` WHERE `author_id` = '$author_id';";
        $data = database_connection()->query($selectQuery);

        if (isset($data)) {
            // $result = mysqli_fetch_assoc($data);
            // print_r($result);
            while ($row = mysqli_fetch_assoc($data)) {
                $code = $row['code'];
                echo '
                <tr>
                    <td>' . $row['code'] . '</td>
                    <td class=" truncate d-none d-lg-table-cell">' . $row['title'] . '</td>
                    <td><span class="bg-success d-block text-white rounded-1 me-4 p-1 d-flex justify-content-center ">' . $row['regular_price'] . '$</span></td>
                    <td class="d-none d-md-table-cell">' . $row['size'] . '</td>
                    <td class="d-none d-md-table-cell">' . $row['color'] . '</td>
                    <td class="d-none d-lg-table-cell truncate">' . $row['product_detail'] . '.</td>
                    <td class="d-none d-lg-table-cell truncate">' . $row['created_at'] . '</td>
                    <td class="d-none d-xl-table-cell">' . $row['author_id'] . '</td>
                    <td class="d-none d-xl-table-cell">
                    <span class="d-block bg-danger rounded-1 p-1 text-white me-3">
                        <i class="bi bi-eye me-2"></i>' . $row['viewers'] . '
                    </span></td>
                    <td class="d-none d-xl-table-cell"> 
                        <img class=" w-50 h-50"" src="../Asset/image/' . $row['Thumbnail'] . '" alt="Thumbnail"> 
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="updateproduct.php?code=' . $code . '" class="btn btn-primary btn-sm">Update</a>
                            <button class="btn btn-danger btn-sm" >Delete</button>
                        </div>
                    </td>
                </tr>
                ';
            }
        }
    }
}


?>