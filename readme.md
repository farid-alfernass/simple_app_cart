
**Start Laravel Server**

.env db 
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=dbmahasiswa
DB_USERNAME=postgres
DB_PASSWORD=password

Open Second **Terminal / CMD** Go to project directory

```
composer install
php artisan migrate
php artisan db:seed --class=UserTableSeeder
php artisan db:seed --class=MahasiswaTableSeeder
php artisan db:seed --class=ProdiTableSeeder
php artisan serve
```

Open http://127.0.0.1:8000 url in multipal browser


**Login with below Users**

| No  | Username | Password |
| ------------- | ------------- | ------------- |
| 1  | user1@gmail.com  | 123456 |
| 2  | user2@gmail.com  | 123456 |
| 3  | user3@gmail.com  | 123456 |

