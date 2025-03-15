<?php
$title = "User Detail";
include '../Controllers/function.php';
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
            <!-- <h4 class="text-center">Dashboard</h4> -->
            <!-- Profile admain account -->
            <div class="container mt-3">
                <div class="profile-card p-2">
                    <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                        alt="Profile Picture" class="profile-img">
                    <h3 class="mt-2">John Doe</h3>
                    <p class=" text-white ">Web Developer</p>
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
                        class="text-danger text-decoration-none" href=""><i class="bi bi-box-arrow-left me-2"></i>
                        Logout</a>
                </li>
            </ul>
        </div>

        <div class="content  p-3 rounded-3 align-middle">
            <div class="col">
                <div class="row">
                    <div class="col-4">
                        <h3>Welcome Nirmal!!</h3>
                    </div>
                    <div class="col-6">
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
                    <div class="col-2 d-flex algin-middle">
                        <div class="icons">
                            <!-- Dark Mode Toggle Button -->
                            <button class="btn btn-success btn-dark-mode me-2" type="button" onclick="toggleDarkMode()">
                                <i class="bi bi-brightness-low"></i>
                            </button>
                        </div>
                        <div class="icons">
                            <button class="btn btn-primary" role="button"><i class="bi bi-bell"></i></button>
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