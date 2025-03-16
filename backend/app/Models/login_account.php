<?php
include('../Controllers/loginaccount.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- link icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- link jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- link sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="http://localhost/full_stack/backend/routes/styleformlogin.css">
</head>

<body>
    <!-- From Uiverse.io by Yaya12085 -->
    <div class="container mt-5">
        <div class="col justify-content-center">
            <div class="row justify-content-center">

                <div class="form-container">
                    <p class="title">Login</p>
                    <form class="form" method="post">
                        <?php
                        if (isset($_GET['message']) == "fail") {
                            echo "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    text: 'Password or username_email are not completed!!',
                                   footer: '<div>Please complete all required fields before submitting.</div>'
                                });
                            </script>";
                        }
                        ?>
                        <div class="input-group">
                            <label for="username">Username/Email</label>
                            <input type="text" name="username_email" id="username" placeholder="">
                        </div>
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="">
                            <div class="forgot">
                                <a rel="noopener noreferrer" href="#">Forgot Password ?</a>
                            </div>
                        </div>
                        <button class="sign" name="sign_in">Sign in</button>
                    </form>
                    <div class="mt-3">
                        <p class="signup">Don't have an account?
                            <a class="" rel="noopener noreferrer" href="index.php" class="">Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>