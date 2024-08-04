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
Before the migration, we need to create an account and password in the MySQL database.
```bash
sudo mysql --user=root --password=
```
```sql
CREATE USER 'sspanel'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'sspanel'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```

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

### 4. Use Laravel Breeze
```bash
composer require laravel/breeze --dev
php artisan breeze:install
```
Now we can register and login to the application.

### 5. create a migration
```bash
php artisan make:migration update_users_table_name_to_username --table=users
```
Edit the migration file in the `database/migrations` folder.

```php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->renameColumn('name', 'username');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->renameColumn('username', 'name');
    });
}
```
Now run the migration
```bash
php artisan migrate
```
The `name` column in the `users` table is now renamed to `username`.

To rollback the migration
```bash
php artisan migrate:rollback
```
Now the `username` column is renamed back to `name`.
Please remember to delete the migration file if you don't need it anymore.

If you want to rollback multiple migrations, for example, rollback 3 migrations
```bash
php artisan migrate:rollback --step=3
```
If you want to rollback all the migrations
```bash
php artisan migrate:reset
```

### 6. create ListItem model
```bash
php artisan make:model ListItem -m
```
This command will create a model file in the `app/Models` folder and a migration file in the `database/migrations` folder.
We can edit the migration file to add columns to the `list_items` table.
Then run the migration
```bash
php artisan migrate
```
