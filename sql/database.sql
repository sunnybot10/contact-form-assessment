CREATE DATABASE IF NOT EXISTS contact_form
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE contact_form;

DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO contacts (name, email, phone, message)
VALUES
(
    'Sunnyboy Mathole',
    'Matholeas@gmail.com',
    '0835551234',
    'contact form submission test.'
);
