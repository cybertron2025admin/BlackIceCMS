<?php
namespace App\Controllers;

use App\Core\View;

class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }
        View::render('dashboard/index');
    }
}