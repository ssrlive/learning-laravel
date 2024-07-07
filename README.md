## learning Laravel

### 1. create a new Laravel project
```bash
composer create-project laravel/laravel example-app
```

### 2. run the project
```bash
cd example-app

php artisan serve
```
Now you can access the project at `http://127.0.0.1:8000`.


### 3. Databases and Migrations
Change the database configuration in the `.env` file
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel10
DB_USERNAME=sspanel
DB_PASSWORD=password
```
Migrations
```bash
php artisan migrate
```

#### 4. Use Laravel Breeze
```bash
composer require laravel/breeze --dev
php artisan breeze:install
```
Now we can register and login to the application.
