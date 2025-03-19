<?php
session_start();
$title = "User Detail";
include '../Controllers/function.php';

// session_start();
if (empty($_SESSION['staff_id'])) {
    header("Location: login_account.php");
}
// join table to bring image show profile
if (isset($_SESSION['staff_id'])) {

    $staff_id = $_SESSION['staff_id'];  // Assuming this session variable is set

    $sql = "SELECT * FROM `users_profile` 
            LEFT JOIN `users` 
            ON `users_profile`.`author_id` = `users`.`staff_id` 
            WHERE `users`.`staff_id` = '$staff_id';";
    $result = database_connection()->query($sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Query failed: " . database_connection()->error);
    }

    // for show profile default male or female
    $staff_id = $_SESSION['staff_id'] ?? null; // Get logged-in user's ID
    if (!empty($staff_id)) {
        // Fix the SQL query by removing the trailing comma
        $selectsql = "SELECT `gender` FROM `users` WHERE `staff_id` = '$staff_id';";
        $queryimage = database_connection()->query($selectsql);

        if ($queryimage) {
            $row = mysqli_fetch_assoc($queryimage);

            if ($row) {
                // Proceed with handling the data (for example, setting the profile image)
                $profile = isset($row['gender']) && $row['gender'] == 'male' ? "defaultmale.png" : "defaultfemale.png";
            } else {
                $profile = "default.png"; // If no user is found
            }
        } else {
            echo "SQL Error: " . database_connection()->error; // For debugging query errors
            $profile = "default.png"; // If query fails
        }
    } else {
        $profile = "defaultfemale.png"; // If no user is logged in
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if ($title) {
        echo $title;
    } ?></title>
    <!-- @link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- @link script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- @link icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- @link jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- @link sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- @link css -->
    <link rel="stylesheet" href="http://localhost/full_stack/backend/routes/styleUserdeatail.css">
    <!-- @chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- @kink css for form -->
    <link rel="stylesheet" href="http://localhost/full_stack/backend/routes/styleform.css">

</head>

<style>
    /* Default Light Mode */
    body {
        background-color: #f8f9fa;
        color: #212529;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    /* Dark Mode */
    body.dark-mode {
        background-color: #121212;
        color: #ffffff;
    }
</style>

<body>
    <div class="container d-flex ">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3 me-3 rounded-1">
            <div class="container mt-3">
                <!-- profile -->
                <div class="profile-card p-2">
                    <?php
                    if (isset($_GET['status'])) {
                        $status = $_GET['status'];
                        if ($status == "success") {
                            echo '<div class="alert alert-success fs-9">profile chances successfully!!</div>';
                        } else {
                            echo '<div class="alert alert-warning fs-9">profile is not completed!</div>';
                        }
                        // using for clear message when show on screen
                        header("refresh:1;url=./dashboardpage.php");
                    }
                    ?>
                    <figure>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <img src="../Asset/<?php echo $profile; ?>" alt="Profile Picture" class="profile-img">

                        </a>
                    </figure>

                    <h3 class="mt-2 fs-3 justify-content-center font-monospace">
                        <?php echo isset($row['user_name']) ? $row['user_name'] : 'Unknown User'; ?>
                    </h3>

                    <p class="text-white">
                        <?php echo isset($row['bio']) ? $row['bio'] : 'No bio available.'; ?>
                    </p>
                    <!-- <button class="btn btn-primary">Edit Profile</button> -->
                </div>
            </div>
            <!-- dash board list -->
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-dark text-white fs-5"><a class="text-white text-decoration-none"
                        href="dashboardpage.php"><i class="bi bi-grid-fill me-2"></i>Dashboard</a>
                </li>
                <li class="list-group-item bg-dark text-white fs-5"><a class="text-white text-decoration-none"
                        href="product.php"><i class="bi bi-unity me-2"></i>Products</a></li>
                <li class="list-group-item bg-dark text-white fs-5"><a class="text-white text-decoration-none"
                        href="order.php"><i class="bi bi-bag me-2"></i>Order</a></li>
                <li class="list-group-item bg-dark text-white fs-5"><a class="text-white text-decoration-none"
                        href="customer.php"><i class="bi bi-people me-2"></i>customer</a></li>
                <li class="list-group-item bg-dark text-white fs-5"><a class="text-white text-decoration-none"
                        href="form_detail.php"><i class="bi bi-ui-checks-grid me-2"></i>Form</a></li>
                <li class="list-group-item bg-dark text-white fs-5"><a class="text-white text-decoration-none"
                        href="report.php"><i class="bi bi-card-checklist me-2"></i>report</a></li>
                <li class="list-group-item bg-dark text-white fs-5"> <a type="submit"
                        class="text-danger text-decoration-none" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"><i class="bi bi-box-arrow-left me-2"></i>
                        Logout</a>
                </li>
            </ul>
        </div>

        <div class="content  p-3 rounded-3 align-middle">
            <div class="col">
                <div class="row">
                    <div class="col-3 d-none d-md-block">
                        <h3>Welcome Nirmal!!</h3>
                    </div>
                    <div class="col-8">
                        <nav class="navbar navbar-light ">
                            <div class="container-fluid">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search...</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                    <div class="col-1 d-flex algin-middle">
                        <div class="icons">
                            <!-- Dark Mode Toggle Button -->
                            <button class="btn btn-success btn-dark-mode me-1" type="button" onclick="toggleDarkMode()">
                                <i class="bi bi-brightness-low"></i>
                            </button>
                        </div>
                        <div class="icons">
                            <button class="btn btn-primary" role="button"><i class="bi bi-bell me-1"></i></button>
                        </div>
                    </div>

                </div>
                <!-- script for chance dark Mode -->
                <script>
                    function toggleDarkMode() {
                        document.body.classList.toggle("dark-mode");

                        // Get button icon and change it
                        let icon = document.querySelector(".btn-dark-mode i");
                        if (document.body.classList.contains("dark-mode")) {
                            icon.classList.remove("bi-brightness-low");
                            icon.classList.add("bi-moon-stars"); // Change to moon icon
                        } else {
                            icon.classList.remove("bi-moon-stars");
                            icon.classList.add("bi-brightness-low"); // Change to sun icon
                        }
                    }
                </script>

                <!-- Modal logout-->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you sure you want to sign out?
                                </h1>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                                <a href="logout.php" type="button" class="btn btn-danger">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Form -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="profileForm" action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="user_profile" class="col-form-label">Profile Picture:</label>
                                        <input type="file" class="form-control" name="user_profile" id="user_profile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="bio" class="col-form-label">Bio:</label>
                                        <textarea class="form-control" name="bio" id="bio"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                            <i class="bi bi-x me-2"></i>Cancel
                                        </button>
                                        <button type="submit" name="submit" class="btn btn-success">
                                            <i class="bi bi-send me-2"></i>Send message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>