<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Restaurant RESTful API
This is a [Laravel Framework](https://laravel.com/) Application.

## Prerequisites
Make sure you have [PHP, MySQL, Apache](https://www.apachefriends.org/pt_br/index.html) and [Composer](https://getcomposer.org/) installed.


## Installing
- Clone this repo:
```
git clone git@github.com:90lucasgabriel/shop-api.git
```
- Access directory:
```
cd shop-api
```
- Install dependencies:
```
composer install
```
- Create a copy of *.env.example* and rename to *.env*;

- Generate Laravel App Key:
```
php artisan key:generate
```


## Setting Database
- Create database;

- Insert into *.env*: database, user and password;

- Create tables and seed database:
```
php artisan migrate:refresh --seed
```


## Running
- Serve the app:
```
php artisan serve
```

Head to http://localhost:8000 in your browser and you'll see the app running.

You can test endpoints with [Postman](https://www.getpostman.com/) or [Insomnia](https://insomnia.rest/).
