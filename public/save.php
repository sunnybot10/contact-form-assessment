<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use App\ContactRepository;
use App\Csrf;
use App\Database;
use App\Flash;
use App\Validator;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

if (!Csrf::verify($_POST['csrf'] ?? null)) {
    Flash::set('danger', 'Invalid request.');

    header('Location: /');
    exit;
}

$data = [
    'name' => trim($_POST['name'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'phone' => trim($_POST['phone'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
];

$validator = new Validator();

if (!$validator->validate($data)) {
    Flash::set(
        'danger',
        implode('<br>', $validator->errors())
    );

    header('Location: /');
    exit;
}

$database = new Database();
$repository = new ContactRepository($database->getConnection());
$repository->create($data);

Flash::set(
    'success',
    'Your message has been sent successfully.'
);

header('Location: /');
exit;