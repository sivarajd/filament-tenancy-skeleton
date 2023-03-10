# Filament Tenancy Skeleton

Skeleton using Filament 2.x & Tenancy for Laravel 3.x.  This will give a Filament Admin based tenant application, and basic Breeze based central admin application.


## Installation

* Clone the repository

`git clone https://github.com/sivarajd/filament-tenancy-skeleton.git your-app-name` 

`cd your-app-name`

`composer install`

* Copy .env.example to .env

`cp .env.example .env`

* Generate app key

`php artisan key:generate`

* Edit .env file to add database credentials

* Migrate & seed the database

`php artisan migrate --seed`

`php artisan tenants:seed`

* Install node modules & build vite resources

`npm install`  
`npm run build`

* Visit http://localhost:8000/ for main page & http://foo.localhost:8000/app/login for Tenant page

* You can login with the following credentials

  - Central domain
    - Email: admin@filamenttenancy.com
    - Password: password 
  - Tenant domains 
    - Email: test@example.com
    - Password: password

Note:

This skeleton uses Subdomain based tenancy by default. If you want to change it, check these files

* config/filament.php
* config/livewire.php
* routes/tenant.php


