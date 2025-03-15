<?php
include '../../routes/database-conncetion.php';

function Login()
{
    // global $connection;
    session_start();
    if (isset($_POST['sign_in'])) {
        // print_r($_POST);
        $username_email = $_POST['username_email'];
        $password = $_POST['password'];

        // echo $username_email;
        // echo $password;
        if (empty($username_email) || empty($password)) {
            header('Location: index.php?message=fail');
        } else {
            $password = md5($password);
            $select_user = "SELECT * FROM `users`
             WHERE (`user_name` = '$username_email' OR `email` = '$username_email' AND `password` = '$password')";

            $result = database_connection()->query($select_user);

            $staff_id = mysqli_fetch_assoc($result);
            // print_r($staff_id);
            header('Loaction: dashboardpage.php');

        }
    }
}
Login();
?>