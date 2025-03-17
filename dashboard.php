<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "student") {
    header("Location: login.php");
    exit();
}

include 'config/db.php';

// Fetch student info
$user_id = $_SESSION["user_id"];
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="styles/sidebar.css">
</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Student Panel</h2>
        <ul>
            <li><a href="student_dashboard.php">🏠 Dashboard</a></li>
            <li><a href="profile.php">👤 Profile</a></li>
            <li><a href="courses.php">📚 My Courses</a></li>
            <li><a href="logout.php">🚪 Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Welcome, <?php echo htmlspecialchars($user["name"]); ?>!</h1>
        <p>Email: <?php echo htmlspecialchars($user["email"]); ?></p>
        <p>Here you can manage your courses, check your grades, and update your profile.</p>
    </div>
</div>

</body>
</html>
