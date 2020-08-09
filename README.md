## SETUP

laravel needs special permissions for writing in the storage folder, please change it with chmod if using linux/mac

## CMD

clone the repository

run `cp .env.example .env`

run `composer install`

run `php artisan key:generate`

run `php artisan serve` to start the web server


please feel free to contact me for any issue running this project


# TODO - OPEN

- bug fix: issue when using special char (using multi byte methods)

- refactoring: view for input box and result could be isolated in 1 component in order to not repeat the same code
