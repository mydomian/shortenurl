# ShortenURL

A simple URL shortening service built with Laravel.

## Project Installation Process

Follow these steps to set up the project locally:

**Installation**:
   ```bash
   git clone https://github.com/mydomain/shortenurl.git

    cd shortenurl
    composer update
    cp .env.example .env
    php artisan key:generate
    php artisan storage:link
    php artisan migrate:fresh --seed
    php artisan serve

##For Login
    email: user@gmail.com,
    password: 12345678,

##Usage
    Once the server is running, you can access the application at http://localhost:8000.
