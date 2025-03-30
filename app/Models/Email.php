<?php
namespace App\Models;

use App\Core\Database;

class Email {
    public static function all() {
        $stmt = Database::getConnection()->query('SELECT * FROM emails ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public static function log($recipient, $subject, $body, $status) {
        $stmt = Database::getConnection()->prepare(
            'INSERT INTO emails (recipient, subject, body, status) VALUES (?, ?, ?, ?)'
        );
        $stmt->execute([$recipient, $subject, $body, $status]);
    }
}
