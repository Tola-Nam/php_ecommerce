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
// function formuploadprofile()
// {
//     global $connection;
//     if (isset($_POST['submit'])) {
//         $gender = isset($_POST['gender']);
//         $sourcefile = $_FILES['user_profile'];
//         $bio = isset($_POST['bio']);

//         if (empty($sourcefile)) {
//             if ($gender == "male") {
//                 $filename = "default.png";
//             } else {
//                 $filename = "defaultfemale.png";
//             }
//         } else {
//             $filename = fileuploader($sourcefile);
//         }
//         if (isset($bio) and isset($sourcefile)) {
//             $filename = fileuploader($sourcefile);
//             $inserQuery = "INSERT INTO `users_profile`(`user_profile`,`bio`)
//                         VALUE ('$filename','$bio')";
//             $Query = database_connection()->query($inserQuery);

//             if ($Query) {
//                 echo 'Input successfully';
//             }
//         }
//     }
// }
// formuploadprofile();

function formuploadprofile()
{
    global $connection;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $bio = isset($_POST['bio']) ? trim($_POST['bio']) : '';
        $filename = "default.png"; // Default profile picture

        // Handle file upload
        if (!empty($_FILES['user_profile']['name']) && $_FILES['user_profile']['error'] == 0) {
            $filename = fileuploader($_FILES['user_profile']);
        }

        // Ensure bio is not empty
        if (!empty($bio)) {
            $insertQuery = "INSERT INTO `users_profile`(`user_profile`, `bio`) VALUES ('$filename', '$bio')";
            $query = database_connection()->query($insertQuery);

            if ($query) {
                echo "<script>alert('Profile uploaded successfully!');</script>";
            } else {
                echo "<script>alert('Database error: " . database_connection()->error . "');</script>";
            }
        } else {
            echo "<script>alert('Bio cannot be empty.');</script>";
        }
    }
}
formuploadprofile();


function showprofile($user_id)
{
    // Query to join users_profile and users table
    $select_profile = "SELECT 
        u.staff_id,
        u.Gender,
        us.user_profile,  -- Profile image
        us.bio            -- Bio from users_profile
    FROM `users_profile` us 
    LEFT JOIN `users` u 
        ON us.author_id = u.staff_id -- Correct join condition
    WHERE u.staff_id = ?";  // Filter by user_id (security best practice)

    // Prepare query
    $conn = database_connection();
    $stmt = $conn->prepare($select_profile);
    $stmt->bind_param("i", $user_id);  // Bind user_id as integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch user data
    if ($row = $result->fetch_assoc()) {
        return $row;
    } else {
        return null; // No user found
    }
}

?>