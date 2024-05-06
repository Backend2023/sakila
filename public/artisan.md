# migrations:
php artisan make:migration create_countries_table
php artisan migrate:generate --tables="address,customer,film,film_category,language,category,actor,film_actor,inventory,film_text,staff,store,payment,rental"
composer require --dev kitloong/laravel-migrations-generator
php artisan migrate:status
php artisan migrate
php artisan db:table film

## composer require --dev kitloong/laravel-migrations-generator
php artisan migrate:generate --tables="address,customer,film,film_category,language,category,actor,film_actor,inventory,film_text,staff,store,payment,rental"


# seeding:
php artisan make:seeder UserSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed
php artisan db:seed --class=CountrySeeder
php artisan db:seed --class=CitySeeder
php artisan db:seed --class=AddressSeeder
php artisan migrate:rollback

# routing
php artisan route:list
php artisan route:list --except-vendor

# models
php artisan make:model City --all
php artisan make:model Country -fc

# tinker
 php artisan tinker

# testing
- php artisan test
<!-- kreira feature browser test  -->
- php artisan make:test UserTest    
<!-- kreira unit test -->
- php artisan make:test UserTest --unit