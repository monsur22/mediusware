# Laravel Project with Laravel Sail (Docker)

This repository contains a Laravel project configured to run in a Docker environment using Laravel Sail. Sail is a lightweight command-line interface for managing Laravel's Docker development environment.

## Prerequisites

Before getting started, ensure you have the following software installed on your system:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [PHP](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/download/)
- [Git](https://git-scm.com/downloads)

## Setup

1. Clone this repository to your local machine:

    ```shell
    git clone https://github.com/monsur22/mediusware/tree/dev.0.0.1
    cd <project_directory>
    ```

2. Create a `.env` file based on the provided example:

    ```shell
    cp .env.example .env
    ```

3. Customize your `.env` file to set your application-specific configurations, such as database, mail, and environment variables.

4. Start the Docker containers with Laravel Sail:

    ```shell
    ./vendor/bin/sail up -d
    ```
    Or
    ```shell
    ./up.sh
    ```

5. Install PHP dependencies using Composer:
Goto the php container and then install

    ```shell
    composer install
    ```

6. Generate your application key:

    ```shell
    php artisan key:generate
    ```

7. Run database migrations:

    ```shell
    php  artisan migrate
    ```

8. Access your Laravel application at [http://localhost](http://localhost).

## Docker Commands

Here are some useful Docker commands for your Laravel Sail development environment:

- Start the containers: `./vendor/bin/sail up -d`
- Stop the containers: `./vendor/bin/sail down`
- View container logs: `./vendor/bin/sail logs`
- Run Composer commands: `./vendor/bin/sail composer <command>`
- Execute Artisan commands: `./vendor/bin/sail artisan <command>`
- Access the MySQL database: `./vendor/bin/sail mysql`
- Access the Redis server: `./vendor/bin/sail redis`
- Enter the PHP container: `./vendor/bin/sail shell`
