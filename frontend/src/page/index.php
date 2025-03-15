<?php
// Initialize error and success messages
$error = "";
$success = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get input values safely
  $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
  $confirm_pass = isset($_POST["confirm_pass"]) ? trim($_POST["confirm_pass"]) : "";

  // Validate password length
  if (strlen($password) < 8) {
    $error = "Password must be at least 8 characters long.";
  }
  // Check if passwords match
  elseif ($password !== $confirm_pass) {
    $error = "Passwords do not match.";
  } else {
    $success = "✅ Passwords match!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Validation in PHP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    .error {
      color: red;
      font-size: 14px;
      margin-top: 10px;
    }

    .success {
      color: green;
      font-size: 14px;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <form method="POST">
    <!-- Password Field -->
    <div class="mt-2">
      <label for="password">Password</label>
      <div class="input-group">
        <span class="input-group-text border-0 bg-white">
          <i class="bi bi-lock"></i>
        </span>
        <input type="password" class="form-control border-start-0" id="password" name="password"
          placeholder="***********" required>
      </div>
    </div>

    <!-- Confirm Password Field -->
    <div class="position-relative mt-2">
      <label for="confirm_pass">Confirm Password</label>
      <div class="input-group">
        <span class="input-group-text border-0 bg-white">
          <i class="bi bi-lock"></i>
        </span>
        <input type="password" class="form-control border-start-0" id="confirm_pass" name="confirm_pass"
          placeholder="***********" required>
      </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="mt-3">Submit</button>

    <!-- Display Error or Success Message -->
    <?php if (!empty($error)): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
      <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
  </form>

</body>

</html>