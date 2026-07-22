<?php
declare(strict_types=1);

namespace App;

use PDO;

class ContactRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function create(array $data): bool
    {
        $sql = <<<SQL
            INSERT INTO contacts
            (name, email, phone, message)
            VALUES
            (:name, :email, :phone, :message)
        SQL;

        $statement = $this->pdo->prepare($sql);

        return $statement->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':message' => $data['message'],
        ]);
    }

    public function all(): array
    {
        $statement = $this->pdo->query("SELECT * FROM contacts ORDER BY created_at DESC");
        return $statement->fetchAll();
    }
}