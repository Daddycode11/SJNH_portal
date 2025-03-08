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
    <link rel="stylesheet" href="styles.css"> <!-- External CSS File -->
</head>
<body>
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
            window.location.href = "login.php";
        }
    }
</script>

</body>
</html>
<style>
/* Global Styles */
body {
    font-family: 'Poppins', sans-serif;
    background: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Hero Section */
.hero {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background: url('./assets/bg.png') center/cover no-repeat;
}

/* Card Styles */
.card {
    background: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 350px;
}

/* Logo Container */
.logo-container {
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
}

/* Logo */
.school-logo {
    width: 120px;
    height: auto;
    max-height: 120px;
}

/* Title & Subtitle */
h1 {
    font-size: 22px;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.subtitle {
    font-size: 1.2em;
    color: #388E3C;
    margin-bottom: 15px;
}

/* Dropdown */
.dropdown {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 15px;
    font-size: 16px;
    background-color: white;
}

/* Button */
.btn {
    width: 100%;
    padding: 10px;
    background: #2E7D32;
    color: white;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background: #1B5E20;
}

</style>