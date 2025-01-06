![Logo](https://images.ctfassets.net/grb5fvwhwnyo/7EOl2d2ObZsDa0tE3FqZz/c9a0f388d3b070ef7156cfe804d44565/logo.svg)
![Logo](https://500lines.com/img/500LinesLogoHorizontal.png)

## Environments
For safty or maybe just preference, you can use Laravel Sail or Docker for reviewing the test.
### Docker
Here's a good container to use for this test from [DockerHub.com](https://hub.docker.com/r/bitnami/laravel)
### Laravel Sail
- You will need [Composer](https://getcomposer.org/download) and [PHP](https://www.php.net/manual/en/install.general.php) installed at the very least on your machine to use Sail.
- Installation instruction on Laravel Sail can be found [here](https://laravel.com/docs/11.x/sail#installing-sail-into-existing-applications).
- When installed, run the following in your app root diectory if not already done.
```
composer require laravel/sail --dev
php artisan sail:install
```
### Local Environment
If you choose to run the app locally, you will need to have [PHP](https://www.php.net/manual/en/install.general.php), [Node](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm), and [Composer](https://getcomposer.org/download) and [PHP](https://www.php.net/manual/en/install.general.php) installed and updated.
## Installation
You will need to setup your .env file in your root directory. You can use the .env-copy as reference.  For convience, I would not change the following line.
```
DB_CONNECTION=sqlite
```
In your root directory, run the following
```
composer install
php artisan migrate:fresh --seed
```
This will install all dependencies and trigger all the seeders needed to populate the app.

To continue, we need to start Node to run VueJS (aka, magic stuff).
```
npm install && npm run dev
```
If running locally, use the following command to skip the having a web server installed.
```
php artisan serv
```

## Login
In the seeder, a test user was created. You will be able to login at http://127.0.0.1:8000/login
There, you can enter the test user's credentials.
```
    user: test@test.com
password: password
```
## Database
- For the test, I used SQLite.  It's quick and dirty and I saw no need to do any complex queries. Which is why I mentioned not changing this line in the .env file.
```
DB_CONNECTION=sqlite
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

This test and all source code in this repo should not be used anywhere for any reason without permission.