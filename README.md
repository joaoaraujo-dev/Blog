# Blog

A personal blog project built with PHP and the Laravel framework. It features a comments section and an administrative dashboard where you can view statistics and manage the website.

## Technologies Used

- PHP
- Laravel
- Laravel Sail
- Bootstrap
- Docker
- MySQL
- Composer

## Requirements

- PHP 8.5.3
- Laravel 13
- Docker
- MySQL 8.4
- Bootstrap 5+
- Composer

---

# How to Run

Follow the steps below to set up and run the project on your local machine.

> ⚠️ **Attention:** Make sure Docker and Docker Desktop are installed and running before you begin.

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/joaoaraujo-dev/Blog.git
   ```

2. **Open the project directory:**

   ```bash
   cd Blog
   ```

3. **Install the project dependencies:**

   ```bash
   composer install
   ```

4. **Install Laravel Sail:**

   ```bash
   composer require laravel/sail --dev
   ```

5. **Create the `.env` file:**

   ```bash
   cp .env.example .env
   ```

6. **Start the Docker containers using Laravel Sail:**

   ```bash
   ./vendor/bin/sail up -d
   ```

7. **Generate the application key and run the migrations:**

   ```bash
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate --seed
   ```

8. **Access the application:**

   Open your browser and visit:

   - http://localhost
   - http://127.0.0.1

## More warnings and tips

- If you are using Windows, install **WSL** to run Docker efficiently.
- Docker Desktop is recommended, as it was used during the development of this project and provides the best compatibility.