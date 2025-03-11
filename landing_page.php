<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['user_role'];
    
    switch ($role) {
        case 'Student':
            header("Location: register.php");
            exit();
        case 'Teacher':
            header("Location: register.php");
            exit();
        case 'Admin':
            header("Location: admin_login.php");
            exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/landingpage.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar">
    <div class="nav-container">
        <a href="#" class="nav-logo">SJNHS Portal</a>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<section class="hero">
    <div class="card">
        <div class="logo-container">
            <img src="https://th.bing.com/th/id/OIP.g9jB_KXtknJiM7iZ2IIjNQHaHn?rs=1&pid=ImgDetMain" alt="SJNHS Logo" class="school-logo">
        </div>
        <h1>SAN JOSE NATIONAL HIGH SCHOOL</h1>
        <p class="subtitle">Student Online Portal</p>
        <form id="roleForm">
            <select class="dropdown" name="user_role" id="userRole" required>
                <option value="" disabled selected>Select Role</option>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Admin</option>
            </select>
            <button type="button" class="btn" onclick="proceedToSignUp()">Next</button>
        <p class="login-link">Already have an account? <a href="login.php">Log in</a></p>
        </form>
    </div>
</section>

<script>
    function proceedToSignUp() {
        const role = document.getElementById("userRole").value;
        if (!role) {
            alert("Please select a role before proceeding.");
            return;
        }
        
        // Redirect based on role
        if (role === "student") {
            window.location.href = "register.php";
        } else if (role === "teacher") {
            window.location.href = "register.php";
        } else if (role === "admin") {
            window.location.href = "admin_login.php";
        }
    }
</script>

</body>
</html>
