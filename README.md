# Laravel E-commerce Starter

The base of a multi-vendor shop built with Laravel. It sets up three separate account types, admins, sellers and clients, each with its own authentication guard, so each side of the shop can have its own login and pages.

## Features

- **Three auth guards:** `admin`, `seller` and `client`, each with its own model and session
- **Admin login:** log in by email or username, admin home page and logout
- Separate route files for each side: `routes/admin.php`, `routes/seller.php`, `routes/client.php`
- Admin seeder to create the first admin account
- Backend layout for the admin pages

## Built with

- PHP 8.1, Laravel 10
- Vite
- MySQL (or any database Laravel supports)

## Run it locally

You need PHP 8.1+, Composer, Node.js and a database.

```bash
git clone https://github.com/hamzakhalem/ecomerce_laravel.git
cd ecomerce_laravel
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```

Set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in `.env`, then:

```bash
php artisan migrate
php artisan db:seed --class=AdminSeeder
php artisan serve
```

Log in at http://127.0.0.1:8000/admin/login with the account from `database/seeders/AdminSeeder.php`.

## Project structure

```
app/Models/            Admin, Seller and Client models
config/auth.php        The admin, seller and client guards and providers
routes/admin.php       Admin login, home and logout
routes/seller.php      Seller routes
routes/client.php      Client routes
resources/views/backend/   Admin pages
```
