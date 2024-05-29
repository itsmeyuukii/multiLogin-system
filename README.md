Steps how i Create a Multi Login with middleware

1. composer create-project laravel/laravel multiLogin
2. Configure the DB connection
    - In .env file change it to
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=multilogin
        DB_USERNAME=root
        DB_PASSWORD=
    - In /config/database.php change the mysql to
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'multilogin'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
    - Create the database name in PHPMYADMIN
3. Go to database/migrations/.php file and search for users
    - Edit the migrations
        Add this to schem 'users'
            $table->string('usertype')->default('user');

4. Type in terminal php artisan migrate
    - Check if its working type php artisan serve
5. Install laravel jetstream
    - type in terminal composer require laravel/jetstream
    - php artisan jetstream:install livewire --dark
6. Create Controller
    - type in terminal php artisa make:Controller HomeController
    - go to HomeController and edit it to have Multilogin using auth
    - takenote: i added some of use
7. Add admin pages
    - Add folder in resources/views/admin
    - Add pages inside resources/views/admin
        - admin.php
            Only Admin is allowed in this page
        - home.php
            i just add this 
            Admin Home
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <input type="submit" value="logout">
            </form>
8. Create MiddleWare
    - type in terminal php artisan make:middleware Admin
9. Edit Middleware to create Authentication of usertype and forbid those who has no access
    - go to http/Middleware/Admin.php
    - Add Auth using this use Illuminate\Support\Facades\Auth;
    - Add this to your code
        if (Auth::user()->usertype == "admin") {
                return $next($request);
            }

            return redirect("/");
            // abort(401);
10. 



    