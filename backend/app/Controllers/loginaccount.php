<?php
include '../../routes/database-conncetion.php';
function Login()
{
    // global $connection;
    session_start();
    if (isset($_POST['sign_in'])) {
        $username_email = $_POST['username_email'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']);
        if (empty($username_email) || empty($password)) {
            header('Location: login_account.php?message=fail');
        } else {
            $password = md5($password);
            $select_user = "SELECT * FROM `users`
                            WHERE ( (`user_name` = '$username_email' OR `email` = '$username_email')
                            AND (`password` = '$password'))";
            try {
                $result = database_connection()->query($select_user);
                $staff_id = mysqli_fetch_assoc($result);
                // check to save password in brower------------------
                if (password_verify($password, $staff_id['password'])) {
                    $_SESSION['username'] = $staff_id['username'];
                }
                if (isset($remember)) {
                    setcookie("username", $staff_id['username_email'], time() + (86400 * 30), "/");
                    setcookie("password", $password, time() + (86400 * 30), "/");
                } else {
                    // Clear cookies if user unchecks "Remember Me"
                    setcookie("username", "", time() - 3600, "/");
                    setcookie("password", "", time() - 3600, "/");
                }
                // -----------------
                if (!$result) {
                    throw new Exception("some field are not completed!! please fill some field");
                }
                if (isset($staff_id)) {
                    $_SESSION['staff_id'] = $staff_id['staff_id'];
                    header("Location: dashboardpage.php ?success");
                } else {
                    header("Location: login_account.php?status=invalid");
                }
            } catch (Exception $e) {
                header("Location: login_accouont.php?meassage=fail");
            }
        }

    }
}

Login();

?>