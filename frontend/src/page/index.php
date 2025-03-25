<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  .footer {
    background: #222;
    color: white;
    padding: 40px 0;
  }

  .footer .text-title span {
    font-size: 18px;
    font-weight: bold;
    color: #f8a100;
    display: block;
    margin-bottom: 10px;
  }

  .footer p {
    font-size: 14px;
    color: #ddd;
  }

  .footer form .form-control {
    border-radius: 5px;
  }

  .footer form .btn {
    background: #f8a100;
    border: none;
    color: white;
    transition: 0.3s;
  }

  .footer form .btn:hover {
    background: #e69500;
  }

  .footer ul {
    list-style: none;
    padding: 0;
  }

  .footer ul li {
    margin-bottom: 8px;
  }

  .footer ul li a {
    color: #ddd;
    text-decoration: none;
    font-size: 14px;
  }

  .footer ul li a:hover {
    text-decoration: underline;
  }

  .footer .container {
    background: #333;
    padding: 30px;
    border-radius: 10px;
  }

  .icons {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }

  /* For small screens, keep the icons in a row */
  @media (max-width: 768px) {
    .icons {
      flex-direction: row !important;
      justify-content: center;
    }

    .icons .btn {
      margin-right: 10px;
      margin-bottom: 10px;
    }
  }
</style>

<body>


  <?php include('./footerpage.php') ?>