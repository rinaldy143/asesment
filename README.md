<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">PHP Laravel Developer Assessment</h2>

---

## 📖 About This Project
This repository contains my submission for the **PHP Laravel Developer Assessment**.  
The project is built using **Laravel 11** with PostgreSQL and Laravel Sanctum for API authentication.  

The goal of this repo is to demonstrate:
- API authentication (register & login).
- User model and role management (`admin`, `organizer`, `customer`).
- Basic health check endpoint.
- Clean and structured project setup.

---

## 🚀 Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/username/repo-name.git
   cd repo-name

2. Install dependencies:

    composer install
    npm install && npm run dev


3. Copy .env.example to .env and update database settings:

    cp .env.example .env


4. Run migrations:

php artisan migrate
php artisan db:seed


5. start the server:

    php artisan serve

Features Implemented

 User model & migration with UUID primary key

 Roles: admin, organizer, customer

 API authentication with Laravel Sanctum

 Auth routes:

POST /auth/register

POST /auth/login

 Health check endpoint: GET /ping

🔄 Work in Progress

 User CRUD endpoints

 Input validation improvements

 Unit/Feature tests

 Additional business logic as required

📌 Notes

This submission is still in progress but demonstrates the main structure.

Code includes comments for clarity on implementation decisions.

Remaining features can be delivered with additional time.
