## About XDG Challenge

it's a web application built using laravel and vue js ,it's used to allow users login using social authentication or normal authentication then they can manage making curd operations on users.

Reasons For Why To Use Laravel & Vue Js

- Laravel comes with a handy authentication scaffold by only executing command ```php artisan make:auth``` , we will have all the logic of registration & login placed

- by default it has the migration tables of users & password_resets which can be shown here [database diagram](database-diagram.png)

- for social authentication , Laravel has a library called [socialite](https://github.com/laravel/socialite) which supports social authentication like github , google , twitter , facebook , etc.

- by default Laravel integrates with [Vue Js](https://vuejs.org/) as front end framework which is known for it's easy learning path , and enjoyable syntax to work with .


so the decision was clear to choose laravel as it shorten the development time with the out of the box features it come with.

## Installation

- clone the repo and run the following commands
- composer install
- cp .env.example .env
- configure the database driver & mail driver in .env file
- configure different social authentication env variables like ```GOOGLE_CLIENT_ID```
- php artisan key:generate
- php artisan migrate --seed
