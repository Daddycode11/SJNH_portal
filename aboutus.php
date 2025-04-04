<?php
// aboutus.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SJNHS Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/landingpage.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">SJNHS Portal</a>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php" class="active">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>
<br>
<br>
<br>
<br>
<!-- About Us Section -->
<section class="about-us">
    <div class="overlay"></div>
    <div class="container">
        <div class="logo-container">
            <img src="https://th.bing.com/th/id/OIP.g9jB_KXtknJiM7iZ2IIjNQHaHn?rs=1&pid=ImgDetMain" alt="SJNHS Logo" class="school-logo">
        </div>
        <h1>About San Jose National High School</h1>
        <p class="subtitle">Empowering Education Through Digital Innovation</p>

        <p>
            San Jose National High School (SJNHS) is committed to providing quality education that fosters academic excellence, character development, and technological advancement. 
            Our institution is dedicated to equipping students and educators with the tools necessary to thrive in an evolving digital landscape.
        </p>

        <h2>Our Mission</h2>
        <p>
            To nurture students with knowledge, skills, and values essential for personal growth and societal contribution through an innovative learning environment.
        </p>

        <h2>Our Vision</h2>
        <p>
            A future-ready learning community where students and teachers leverage technology to enhance education and create meaningful impact.
        </p>

        <h2>About the SJNHS Student Portal</h2>
        <p>
            The <b>SJNHS Student Portal</b> is an online platform designed to simplify academic access for students, teachers, and administrators. 
            With features such as course management, grade tracking, announcements, and secure authentication, this portal ensures a seamless and efficient educational experience.
        </p>
        
        <p class="cta">Join us in shaping the future of education. <a href="register.php">Get started today!</a></p>
    </div>
</section>

</body>
</html>

<style>
/* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
}

/* Background Image */
.about-us {
    position: relative;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
  background: url("../assets/bg.png") no-repeat center center/cover;
    color: white;
    padding: 80px 20px;
}

/* Dark Overlay */
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
}

/* Navigation Bar */
.navbar {
    background: rgba(11, 12, 11, 0.95);
    padding: 15px;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 80%;
    margin: auto;
}

.nav-logo {
    font-size: 24px;
    font-weight: bold;
    color: white;
    text-decoration: none;
}

.nav-links {
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-links li {
    display: inline;
    margin: 0 15px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-weight: 500;
}

.nav-links a.active {
    text-decoration: underline;
    font-weight: bold;
}

/* Container */
.container {
    position: relative;
    z-index: 2;
    background: rgba(255, 255, 255, 0.95);
    padding: 40px;
    border-radius: 10px;
    width: 60%;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    color: #333;
    text-align: left;
}

/* School Logo */
.school-logo {
    width: 120px;
    display: block;
    margin: 0 auto 20px;
}

/* Headings */
h1, h2 {
    color: #2E7D32;
    text-align: center;
}

.subtitle {
    font-size: 18px;
    color: #555;
    text-align: center;
    margin-bottom: 20px;
}

/* CTA */
.cta {
    text-align: center;
    font-size: 16px;
    margin-top: 20px;
}

.cta a {
    color: #2E7D32;
    font-weight: bold;
    text-decoration: none;
}

.cta a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 90%;
    }
}
</style>
