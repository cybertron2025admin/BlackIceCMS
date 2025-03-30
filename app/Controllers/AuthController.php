<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Email;

class AuthController {
    public function loginPage() {
        View::render('auth/login');
    }

    public function login() {
        $user = User::findByEmail($_POST['email']);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /dashboard');
            exit;
        }
        View::render('auth/login', ['error' => 'Invalid credentials']);
    }

    public function logout() {
        session_destroy();
        header('Location: /');
        exit;
    }

    public function resetPage() {
        View::render('auth/reset');
    }

    public function reset() {
        $user = User::findByEmail($_POST['email']);
        if ($user) {
            $token = \Firebase\JWT\JWT::encode([
                'email' => $user['email'],
                'iat' => time(),
                'purpose' => 'reset'
            ], $_ENV['JWT_SECRET'], 'HS256');
            
            $resetLink = $_ENV['APP_URL'] . '/password/reset/confirm?token=' . $token;
            
            $subject = 'Reset Password';
            $body = "Click to reset your password: $resetLink";
            Email::log($user['email'], $subject, $body, 'Wysłano');
            $_SESSION['message'] = 'Link to reset your password has been sent (simulation).';
        } else {
            $_SESSION['message'] = 'If the email exists, a reset link has been sent.';
        }
        View::render('auth/reset');
    }

    public function changePassword() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm'] ?? '';
    
        if ($password !== $confirm) {
            View::render('auth/change', ['email' => $email, 'error' => 'Passwords do not match.']);
            return;
        }
    
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = \App\Core\Database::getConnection()->prepare('UPDATE users SET password = ? WHERE email = ?');
        $stmt->execute([$hash, $email]);
    
        $_SESSION['message'] = 'Password changed successfully. You can now log in.';
        header('Location: /');
        exit;
    }

    public function showResetForm() {
        $token = $_GET['token'] ?? '';
    
        try {
            $decoded = \Firebase\JWT\JWT::decode($token, new \Firebase\JWT\Key($_ENV['JWT_SECRET'], 'HS256'));
    
            if (!isset($decoded->email) || $decoded->purpose !== 'reset') {
                throw new \Exception('Invalid token');
            }
    
            $email = $decoded->email;
            View::render('auth/change', ['email' => $email]);
    
        } catch (\Exception $e) {
            echo "<p style='color:red'>Invalid or expired reset token.</p>";
            http_response_code(403);
        }
    }
    
    
    
}