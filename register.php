<?php
session_start();
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = htmlspecialchars(trim($_POST["full_name"]));
    $birth_date = $_POST["birth_date"];
    $address = htmlspecialchars(trim($_POST["address"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    
    // Check for empty fields
    if (empty($full_name) || empty($birth_date) || empty($address) || empty($email) || empty($password)) {
        header("Location: signup.html?error=empty_fields");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.html?error=invalid_email");
        exit();
    }

    // Enforce password security
    if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        header("Location: signup.html?error=weak_password");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = 'student';

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register.php.php?error=email_exists");
        exit();
    }
    $stmt->close();

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (full_name, birth_date, address, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $full_name, $birth_date, $address, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        header("Location: login.php?success=registered");
        exit();
    } else {
        header("Location: register.php?error=registration_failed");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - SJNHS Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="signup-container">
  <div class="signup-card">
      
    <!-- Logo -->
    <div class="logo-container">
      <img src="https://th.bing.com/th/id/OIP.g9jB_KXtknJiM7iZ2IIjNQHaHn?rs=1&pid=ImgDetMain" alt="SJNHS Logo" class="school-logo">
    </div>

    <h2 class="card-title">SAN JOSE NATIONAL HIGH SCHOOL STUDENT PORTAL</h2>
    <h3 class="sub-title">Register</h3>
    
    <form action="register.php" method="POST" onsubmit="return validatePasswords()">
      <div class="form-group-row">
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="text" id="fullName" name="full_name" placeholder="Enter your full name" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="birthDate">Birth Date</label>
          <input type="date" id="birthDate" name="birth_date" class="form-control" required>
        </div>
      </div>

      <div class="form-group-row">
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" id="address" name="address" placeholder="Enter your address" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control" required>
        </div>
      </div>

      <div class="form-group-row">
        <div class="form-group">
          <label for="password">Create Password</label>
          <input type="password" id="password" name="password" placeholder="Create a password" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" id="confirmPassword" placeholder="Confirm your password" class="form-control" required>
          <small id="passwordError" style="color: red; display: none;">Passwords do not match!</small>
        </div>
      </div>

      <div class="button-group">
        <button type="button" class="btn back-btn" onclick="window.history.back()">Back</button>
        <button type="submit" class="btn signup-btn">Sign Up</button>
      </div>
    </form>
    
    <p class="login-link">Already have an account? <a href="login.php">Log in</a></p>

  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    if (params.has("error")) {
        let message = "";
        switch (params.get("error")) {
            case "email_exists":
                message = "Email already exists! Try another email.";
                break;
            case "invalid_email":
                message = "Invalid email format!";
                break;
            case "weak_password":
                message = "Password must be at least 8 characters long and contain letters and numbers.";
                break;
            case "empty_fields":
                message = "All fields are required!";
                break;
            case "registration_failed":
                message = "Error registering user. Please try again.";
                break;
        }
        if (message) {
            alert(message);
        }
    }
});
</script>


</body>
</html>
<style>
    /* Background with an image */
.signup-container {
  background: url('./assets/bg.png') center/cover no-repeat;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  font-family: 'Roboto', sans-serif;
}

/* Card container */
.signup-card {
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 550px;
  padding: 30px;
  text-align: center;
}

/* Title Styles */
.card-title {
  font-family: 'Poppins', sans-serif;
  font-size: 24px;
  font-weight: 600;
  color: #333;
}

.sub-title {
  font-size: 18px;
  font-weight: 500;
  color: #555;
  margin-bottom: 20px;
}

/* Form Styling */
.form-group-row {
  display: flex;
  gap: 15px;
  margin-bottom: 15px;
}

.form-group {
  flex: 1;
  text-align: left;
}

label {
  display: block;
  font-size: 14px;
  font-weight: 500;
  color: #555;
  margin-bottom: 5px;
}

input.form-control {
  width: 100%;
  padding: 12px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  box-sizing: border-box;
  color: #333;
}

/* Button Styling */
.button-group {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

button.btn {
  padding: 12px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  width: 48%;
  transition: background-color 0.3s ease;
}

button.signup-btn {
  background-color: #4CAF50;
  color: white;
}

button.signup-btn:hover {
  background-color: #45a049;
}

button.back-btn {
  background-color: #ddd;
  color: #333;
}

button.back-btn:hover {
  background-color: #ccc;
}

/* Login Link */
.login-link {
  margin-top: 15px;
  font-size: 14px;
}

.login-link a {
  color: #4CAF50;
  text-decoration: none;
}

.login-link a:hover {
  text-decoration: underline;
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .form-group-row {
    flex-direction: column;
  }
  .signup-card {
    width: 90%;
  }
}

/* Logo Container */
.logo-container {
  display: flex;
  justify-content: center;
  margin-bottom: 15px;
}

/* Adjust Logo Size */
.school-logo {
  width: 120px;
  height: auto;
  max-height: 120px;
}

</style>