<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\Email;

class MailController {
    public function index() {
        $logs = Email::all();
        View::render('mail/logs', ['logs' => $logs]);
    }
}