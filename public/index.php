<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use App\ContactRepository;

$database = new Database();
$repository = new ContactRepository($database->getConnection());

echo '<pre>';
print_r($repository->all());
echo '</pre>';