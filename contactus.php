<?php
// contactus.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SJNHS Portal</title>
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
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php" class="active">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Bulletin Board Contact Section -->
<section class="contact-board">
    <div class="overlay"></div>
    <div class="board-container">
        <div class="board-header">
            <h1>📌 Contact Us</h1>
            <p>Need assistance? Reach out to us!</p>
        </div>

        <div class="board-content">
            <div class="note">
                <h2>📍 School Address</h2>
                <p>San Jose National High School, <br> San Jose, Occidental Mindoro</p>
            </div>
            <div class="note">
                <h2>📞 Contact Number</h2>
                <p>Phone: (043) 123-4567</p>
                <p>Mobile: +63 912 345 6789</p>
            </div>
            <div class="note">
                <h2>✉️ Email</h2>
                <p>info@sjnhs.edu.ph</p>
            </div>
            <div class="note">
                <h2>📅 Office Hours</h2>
                <p>Monday - Friday: 8:00 AM - 5:00 PM</p>
                <p>Saturday & Sunday: Closed</p>
            </div>
        </div>

        <div class="contact-form">
            <h2>📬 Send us a message</h2>
            <form action="send_message.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
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

/* Background */
.contact-board {
    position: relative;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: url('../assets/bulletin_bg.jpg') no-repeat center center/cover;
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

/* Bulletin Board */
.board-container {
    position: relative;
    z-index: 2;
    background: #f4e0c9;
    padding: 40px;
    border-radius: 15px;
    width: 60%;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    text-align: left;
    border: 5px solid #c78b3f;
}

/* Board Header */
.board-header h1 {
    text-align: center;
    color: #8B4513;
    font-size: 28px;
}

.board-header p {
    text-align: center;
    color: #555;
    font-size: 16px;
}

/* Notes (Sticky Note Effect) */
.board-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
}

.note {
    background: #fffa65;
    padding: 20px;
    margin: 10px;
    width: 45%;
    border-radius: 10px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    font-size: 16px;
    color: #444;
}

.note h2 {
    color: #8B4513;
    font-size: 20px;
}

/* Contact Form */
.contact-form {
    margin-top: 30px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
}

.contact-form h2 {
    text-align: center;
    color: #8B4513;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.contact-form button {
    width: 100%;
    padding: 10px;
    background: #c78b3f;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.contact-form button:hover {
    background: #8B4513;
}

/* Navigation Bar */
..navbar {
    background: rgba(0, 0, 0, 0.9);
    padding: 15px;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000; /* Ensures navbar stays on top */
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

/* Responsive Design */
@media (max-width: 768px) {
    .board-container {
        width: 90%;
    }

    .note {
        width: 100%;
    }
}
</style>
