<?php
include '../Controllers/function.php';
registerUser();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("C:/xampp/htdocs/Full_stack/backend/routes/connection_link.php"); ?>
</head>
<style>
    .error {
        color: red;
        font-size: 14px;
    }

    .success {
        color: green;
        font-size: 14px;
    }
</style>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-8  shadow-lg p-4 rounded">
            <div class="row">
                <div class="col">
                    <h3 class="text-center text-primary shadow-lg">Welcome to register Account</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mt-2">
                            <?php
                            if (isset($_GET['status']) == "empty") {
                                echo "
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        text: 'Something went wrong!',
                                       footer: '<div>Please complete all required fields before submitting.</div>'
                                    });
                                </script>";
                            }
                            //  else {
                            //     echo "
                            //     <script>
                            //         Swal.fire({
                            //             icon: 'success',
                            //             title: 'Oops...',
                            //             text: 'Complete successfully!',
                            //             footer: '<a href=\"#\">Please complete all required fields before submitting.</a>'
                            //         });
                            //     </script>";
                            // }
                            
                            ?>
                            <label for="user_name">User name</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-white"><i
                                        class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control border-start-0" id="user_name" name="user_name"
                                    placeholder="Enter your user name">
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-white"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control border-start-0" id="email" name="email"
                                    placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-white">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" id="password" name="password"
                                    placeholder="***********">
                                <span class="input-group-text border-0 bg-white" id="togglePassword"
                                    style="cursor: pointer;">
                                    <i class="bi bi-eye-slash"></i> <!-- Default icon -->
                                </span>
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="position-relative mt-2">
                            <label for="confirm_pass">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-white">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" id="confirm_pass"
                                    name="confirm_pass" placeholder="***********">
                                <span class="input-group-text border-0 bg-white" id="toggleConfirmPassword"
                                    style="cursor: pointer;">
                                    <i class="bi bi-eye-slash"></i> <!-- Default icon -->
                                </span>
                            </div>
                            <?php
                            if (isset($_GET['meassage'])) {
                                $message = $_GET['message'];

                                echo '<div class="error">Password does not match or password length is less than 8 characters</div>';
                            }
                            ?>
                        </div>
                        <!-- for gender -->
                        <div class="mt-3">
                            <label class="form-label d-block">Gender</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female">
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input-group d-flex flex-column align-items-start">
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">
                                        I agree to all statements in <a href="#" class="text-primary">Terms of
                                            Service</a>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-2 w-100">SIGN UP</button>
                            </div>
                        </div>
                        <div class="mt-3">

                            <span class=" text-white">Already have an account?<a href="login_account.php"
                                    class="text-primary">
                                    Login</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!-- JavaScript for Toggle Password Visibility -->
<script src="http://localhost/full_stack/backend/app/Controllers/main.js"></script>