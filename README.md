# LP Meritocracy

## Introduction
The goal of this application is to provide a platform for the Libertarian Party is to post and discuss possible candidates while offering resources and information.

## Technologies
- [Laravel 11](https://laravel.com/docs/11.x)
- [Inertia.js](https://inertiajs.com/)
- [Vue.js](https://vuejs.org/)
- [Vuetify](https://vuetifyjs.com/)
- [Sail (Docker)](https://laravel.com/docs/11.x/sail)
- [Pint](https://laravel.com/docs/11.x/pint)

## Requirements
- PHP 8.x
- Composer
- Node.js

## Installation
1. Clone the repository
2. Run `composer install`
3. Run `npm install`
4. Run `npm run dev`
5. Run `php artisan migrate`
6. Run `php artisan db:seed`
7. Run `php artisan serve`

You can use the default admin account at [/login](localhost:8000/login)
 see database/seeders/DevelopmentSeeder.php for the credentials

Or you can create a user with the `php artisan user:create` command
