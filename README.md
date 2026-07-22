# Contact Form Coding Assessment

## Requirements

* PHP 8.4 or newer
* Composer
* MySQL 5.7+ or MariaDB
* Web browser

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/sunnybot10/contact-form-assessment.git
cd contact-form-assessment
```

### 2. Install Composer dependencies

```bash
composer install
```

### 3. Create the database
Import the SQL file located in the `sql` directory.

```bash
mysql -u root -p < sql/database.sql
```

Alternatively, import it using phpMyAdmin or another MySQL client.
### 4. Configure the database

Update the database credentials in:
```text
config/database.php
```

Example:

```php
return [
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'contact_form',
    'username' => 'root',
    'password' => '123456',
];
```

### 5. Start the application

Using PHP's built-in web server:

```bash
php -S localhost:8000 -t public
```

Open your browser:

```text
http://localhost:8000
```

## Application Pages

| URL            | Description            |
| -------------- | ---------------------- |
| `/`            | Contact form           |
| `/entries.php` | View saved submissions |

## Author

**Sunnyboy Mathole**
