# Filament Tenancy Skeleton

Skeleton using Filament 2.x & Tenancy for Laravel 3.x.


## Installation

* Clone the repository

`git clone https://github.com/sivarajd/filament-tenancy-skeleton.git`


* Copy .env.example to .env

`cp .env.example .env`

* Edit .env file to add database credentials

* Migrate & seed the database

`php artisan migrate --seed`
`php artisan tenants:seed`

* Visit http://localhost:8000/ for main page & http://foo.localhost:8000/app/login for Tenant page

Note:

This skeleton uses Subdomain based tenancy by default. If you want to change it, check these files

* config/filament.php
* config/livewire.php
* routes/tenant.php
