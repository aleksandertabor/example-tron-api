Example TRON API
======================
> Interacting with [Tron API](https://developers.tron.network/reference).

# 🚩 Table of Contents

1. [Requirements](#-requirements)
2. [Installation](#-installation)
3. [Documentation](#-documentation)
4. [Built with](#-built-with)

## 🔌 Requirements

- PHP version: >= 7.2.5
- Composer

## 🧾 Installation

1. `git clone https://github.com/aleksandertabor/example-tron-api YOURPROJECTNAME`
2. `cd YOURPROJECTNAME`
3. Install dependencies:

    `composer install`

4. `cp .env.example .env`
5. `php artisan key:generate`
6. Set your `.env` with credentials to your database server (`DB_*` settings) and your domain config (`APP_URL`).
8. `php artisan migrate`
11. Run your server `php artisan serve`.

> ⚠️ Caution: Remember about giving proper permissions to the project directory e.g.:
```bash
sudo chgrp -R www-data /var/www/YOURPROJECTNAME
sudo chmod -R 775 /var/www/YOURPROJECTNAME/storage
```

## 📚 Documentation
> Documentation generated with OpenAPI (Swagger) standard

Available on:
- [`api-docs.json`](/storage/docs/api-docs.json) JSON file that you can preview online on [Swagger Editor](https://editor.swagger.io/)

or

-  `/api/documentation` endpoint on the running application locally

## 🧰 Built with

- Laravel 7