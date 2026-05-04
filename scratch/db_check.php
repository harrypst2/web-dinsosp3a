<?php
define('FCPATH', __DIR__ . '/../public/');
require_once __DIR__ . '/../vendor/autoload.php';
$paths = new \Config\Paths();
require_once $paths->systemDirectory . '/bootstrap.php';

$db = \Config\Database::connect();
try {
    $query = $db->query("SELECT * FROM about LIMIT 1");
    echo "Success: " . json_encode($query->getResult());
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
