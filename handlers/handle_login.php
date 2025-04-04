<?php
session_start();
require_once '../config/db.php'; 
header('Content-Type: application/json');

$response = ['success' => false, 'message' => '']; // Default response

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email)) {
        $response['message'] = 'Email field is required.';
    } elseif (empty($password)) {
        $response['message'] = 'Password field is required.';
    } else {
        // Query database for user
        $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];

                $response['success'] = true;
            } else {
                $response['message'] = 'Invalid email or password.';
            }
        } else {
            $response['message'] = 'Invalid email or password.';
        }

        $stmt->close();
    }
}

// Return JSON response
echo json_encode($response);
exit;
?>