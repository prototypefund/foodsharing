## Foodsharing powered by Laravel

This is foodsharing in a Laravel app with very simple integrations and nearly zero changes to the version without framework

### Installation

1. Clone the repo and go in the repo directory

```
git clone https://github.com/foodsharing-dev/foodsharing.git
cd foodsharing
```

2. make laravels .env file

```
cp .env.example .env && php artisan key:generate
```

3. change mysql config in `.env` file

```
DB_HOST=127.0.0.1
DB_DATABASE=[your database]
DB_USERNAME=[your username]
DB_PASSWORD=[your password]
```

4. run installation

```
composer install
php artisan fs:install
```


5. run dev server

```
FS_ENV=laravel php artisan serv
```

instead of `php artisan fs:install` you can also use the web installer http://yourdomain/install

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