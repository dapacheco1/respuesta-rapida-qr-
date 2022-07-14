# FAST QR API


## PROJECT SETUP

Please, before use this project update all dependencias with composer.

``composer update``

### Database Setup

I use MySQL database Engine. To setup the database from this project, please follow these steps:
- Create new database on MySQL
- Rename **.env.example** to **.env**
- Go to MySQL db connection and change all settings for your environment.
- Execute this command ``php artisan migrate:refresh --seed`` to generate database with random data.
