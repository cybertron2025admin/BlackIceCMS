<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class WeaponController {
    public function index() {
        $stmt = Database::getConnection()->query('SELECT * FROM weapons');
        $weapons = $stmt->fetchAll();
        View::render('weapons/index', ['weapons' => $weapons]);
    }

    public function add() {
        View::render('weapons/add');
    }

    public function store() {
        $file = $_FILES['attachment'];
        $filename = uniqid() . '_' . $file['name'];
        $path = $_POST['path'];
        // '/../../storage/attachments/'

        move_uploaded_file($file['tmp_name'], __DIR__ . $path . $filename);

        $stmt = Database::getConnection()->prepare('INSERT INTO weapons (name, location, quantity, attachment) VALUES (?, ?, ?, ?)');
        $stmt->execute([$_POST['name'], $_POST['location'], $_POST['quantity'], $path.$filename]);

        header('Location: /weapons');
    }

    public function download() {
        $token = $_GET['file'] ?? '';
        if (!$token) {
            http_response_code(403);
            echo 'Token required.';
            exit;
        }



        try {
            $decoded = JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));
            $filepath = __DIR__ . $decoded->file;

// NEMO (/home/nemo/): Be careful with this, there's a security vulnerability here, especially if someone doesn't change the JWT secret.
// ..../weapons/download?file=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmaWxlIjoiLy4uLy4uLy4uLy4uLy4uLy4uL2V0Yy9wYXNzd2QiLCJmbGFnIjoiQ1lCRVJUUk9OX0ZMQUdBW1BhdGhUcmF2ZXJzYWxBdHRhY2tdIiwiaWF0IjoxNzQzMzI3MTUyfQ.iCradswGi1CljeHwiYMXxOWkM_RHEz2P79XT41YyHHE
// https://gchq.github.io/CyberChef/#recipe=JWT_Sign('kjasdlj','HS256','%7B%22typ%22:%22JWT%22,%22alg%22:%22HS256%22%7D')&input=eyJmaWxlIjoiLy4uLy4uLy4uLy4uLy4uLy4uL2V0Yy9wYXNzd2QifQ

            if (file_exists($filepath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
                readfile($filepath);
                exit;
            } else {
                http_response_code(404);
                echo 'File not found.';
            }
        } catch (\Exception $e) {
            http_response_code(403);
            echo 'Invalid token.';
        }
    }

    public function clear() {
        $db = \App\Core\Database::getConnection();
    
        // 1. Pobierz wszystkie pliki do usunięcia
        $stmt = $db->query('SELECT attachment FROM weapons');
        $files = $stmt->fetchAll();
    
    
        // 3. Usuń dane z bazy
        $db->exec('DELETE FROM weapons WHERE id!=1');
    
        header('Location: /weapons');
        exit;
    }
    
}
