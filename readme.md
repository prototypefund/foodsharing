## Foodsharing powered by Laravel

This is foodsharing in a Laravel app with very simple integrations and nearly zero changes to the version without framework

### Installation

1. Clone the repo and go in the repo directory

```
git clone https://github.com/foodsharing-dev/foodsharing.git
cd foodsharing
```


2. get composer dependencies

```
composer install
```


3. run dev server

```
FS_ENV=laravel php artisan serv
```

4. Go to http://localhost:8000/install

instead of using web installer you can also use the command `php artisan fs:install`

### additional

Seed some dummy users

```
php artisan fs:seed
```

minify changes in css and js files

```
php artisan fs:minify
```

### :o)