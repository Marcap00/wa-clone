<p align="center">
<a href="https://getbootstrap.com" target="_blank"><img src="https://miro.medium.com/v2/resize:fit:400/1*onZhQJU7A3ab6V1sHfMRkQ.jpeg" height="150"></a>
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="150"></a>
<a href="https://sass-lang.com/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Sass_Logo_Color.svg/1200px-Sass_Logo_Color.svg.png" height="150"></a>

</p>

## Steps to create a new Laravel.x auth project using bootstrap and laravel/ui
- Creiamo un nuovo progetto `composer create-project laravel/laravel:^10 your-project-name*`
- Installiamo il pacchetto necessario `composer require laravel/ui`
- Applichiamo lo scaffolding necessario di laravel/ui: `php artisan ui bootstrap --auth`
- Eseguiamo `npm i` e
- Configuriamo con i nostri dati il  `.env`
- Eseguiamo `php artisan migrate`
- Eseguiamo su due terminali paralleli:
    -  `npm run dev` 
    -  `php artisan serve` 
- Divertitevi!

## Steps to use this project correctly:
- Copy and paste the `.env.example` file and rename it into `.env` **without removing the `env.example` file**
- Run `composer install` to install all our composer packages
- Run `php artisan key:generate` to generate our custom application key
- Run `npm i` to install all our npm packages
- Run on two separeted terminals:
    - run `npm run dev` to build iteratively our front-end packages and code
    - run `php artisan serve` to build iteratively our back-end packages and code
- Start changing the world with your oustanding code!
