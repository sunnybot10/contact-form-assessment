<?php
declare(strict_types=1);
namespace App;

class Validator
{
    private array $errors = [];

    public function validate(array $data): bool
    {
        $this->errors = [];
        $this->validateName($data['name'] ?? '');
        $this->validateEmail($data['email'] ?? '');
        $this->validatePhone($data['phone'] ?? '');
        $this->validateMessage($data['message'] ?? '');

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    private function validateName(string $name): void
    {
        $name = trim($name);
        if ($name === '') {
            $this->errors['name'] = 'Name is required.';
            return;
        }

        if (strlen($name) < 2) {
            $this->errors['name'] = 'Name must be at least 2 characters.';
        }
    }

    private function validateEmail(string $email): void
    {
        $email = trim($email);
        if ($email === '') {
            $this->errors['email'] = 'Email is required.';
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }
    }

    private function validatePhone(string $phone): void
    {
        $phone = preg_replace('/\s+/', '', trim($phone));
        if ($phone === '') {
            $this->errors['phone'] = 'Phone number is required.';
            return;
        }

        if (!preg_match('/^(\+27|27|0)[6-8][0-9]{8}$/', $phone)) {
            $this->errors['phone'] = 'Please enter a valid South African phone number.';
        }
    }

    private function validateMessage(string $message): void
    {
        $message = trim($message);
        if ($message === '') {
            $this->errors['message'] = 'Message is required.';
            return;
        }

        if (strlen($message) < 10) {
            $this->errors['message'] = 'Message must be at least 10 characters.';
        }

        if (strlen($message) > 1000) {
            $this->errors['message'] = 'Message may not exceed 1000 characters.';
        }
    }
}