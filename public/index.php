<?php
ini_set('display_errors',1);
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;
use App\Core\Database;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Database::init([
    'host' => $_ENV['DB_HOST'],
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'pass' => $_ENV['DB_PASS'],
]);

session_start();

Router::dispatch();