<h1 align="center">Air Cleaning</h1>

## System Requirements

The following are required to function properly.

*   Laravel Version: ^9.19
*   PHP Version: 8.0.2
*   Composer Version: 2.0

## About Air Cleaning Project

This project is about Air Cleaning.

We have created the API for the air cleaning in this project.

- Air Ducts (Create, Update, Delete, Lists)
- Dryer Vents (Create, Update, Delete, Lists)

## Install

You can create new Air cleaning project using git clone

	git clone "https://github.com/shailesh-jakhaniya/air-cleaning"

After the project is created run the following commands

	cd air-cleaning

Fetch the all code from remote branches to local branches

	git fetch --all

Assuming you've already installed composer on your machine: 2.4.4, [Composer](https://getcomposer.org)

    composer self-update or composer self-update --2

Install the dependencies using composer

	composer install

Copy the environment from .env.example to .env and add database connection

    cp .env.example .env

Then generate application key

    php artisan key:generate

#### Update configuration File

we need to add set configuration on env file and database configuration file. you you need to set env file with check database configuration.

Let's updated files:

.env

```env

DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Then run the migrations

    php artisan migrate

Then passport install

    php artisan passport:install

Now you can run project

Start the local development server

    php artisan serve

	You can now access the server at http://localhost:8000

Or I have added the POSTMAN collection of the API in root path.

Or You can create virtual host and execute the project in your local system.
