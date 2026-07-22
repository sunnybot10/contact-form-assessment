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
        $sql = <<<SQL
        SELECT
            id,
            name,
            email,
            phone,
            message,
            created_at
        FROM contacts
        ORDER BY created_at DESC
        SQL;
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll();
    }
}