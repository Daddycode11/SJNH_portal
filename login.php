<?php
session_start();
include 'config/db.php';

$error_message = "";


    

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["role"] = $user["role"];

                // Redirect based on role
                if ($user["role"] === "admin") {
                    header("Location: admin_dashboard.php");
                } elseif ($user["role"] === "teacher") {
                    header("Location: teacher_dashboard.php");
                } elseif ($user["role"] === "student") {
                    header("Location: student_dashboard.php");
                } else {
                    header("Location: dashboard.php");
                }
                exit();
            } else {
                $error_message = "Incorrect password. Please try again.";
            }
        } else {
            $error_message = "No account found with this email.";
        }
        $stmt->close();
    } else {
        $error_message = "Please enter both email and password.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Logo -->
    <div class="logo-container">
      <img src="https://th.bing.com/th/id/OIP.g9jB_KXtknJiM7iZ2IIjNQHaHn?rs=1&pid=ImgDetMain" alt="SJNHS Logo" class="school-logo">
    </div>
            <h2 class="card-title">Welcome Back</h2>
            <p class="sub-title">Sign in to continue</p>

            <?php if (!empty($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <div class="forgot-password">
                    <a href="forgot-password.php">Forgot Password?</a>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn login-btn">Login</button>
                    <button type="button" class="btn back-btn" onclick="window.location.href='index.php'">Back</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<style>

.login-container {
  background: url('./assets/bg.png') center/cover no-repeat;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  font-family: 'Roboto', sans-serif;
}

/* Card */
.login-card {
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
  padding: 30px;
  text-align: center;
}

/* Logo */
.logo-container {
  display: flex;
  justify-content: center;
  margin-bottom: 15px;
}

.school-logo {
  width: 100px;
  height: auto;
}

/* Titles */
.card-title {
  font-family: 'Poppins', sans-serif;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}

.sub-title {
  font-size: 16px;
  font-weight: 500;
  color: #555;
  margin-bottom: 20px;
}

/* Form */
.form-group {
  margin-bottom: 15px;
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

/* Forgot Password */
.forgot-password {
  text-align: right;
  font-size: 14px;
  margin-bottom: 15px;
}

.forgot-password a {
  color: #4CAF50;
  text-decoration: none;
}

.forgot-password a:hover {
  text-decoration: underline;
}

/* Buttons */
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

button.login-btn {
  background-color: #4CAF50;
  color: white;
}

button.login-btn:hover {
  background-color: #45a049;
}

button.back-btn {
  background-color: #ddd;
  color: #333;
}

button.back-btn:hover {
  background-color: #ccc;
}

/* Responsive */
@media (max-width: 768px) {
  .login-card {
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
  width: 120px;  /* Adjust width as needed */
  height: auto;  /* Maintain aspect ratio */
  max-height: 120px; /* Prevent excessive height */
}
</style>