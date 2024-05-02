# migrations:
php artisan make:migration create_countries_table
php artisan migrate:generate --tables="address,customer,film,film_category,language,category,actor,film_actor,inventory,film_text,staff,store,payment,rental"
composer require --dev kitloong/laravel-migrations-generator
php artisan migrate:status
php artisan migrate
php artisan db:table film

# seeding:
php artisan db:seed
php artisan migrate:rollback

# routing
php artisan route:list
php artisan route:list --except-vendor

# models
php artisan make:model City --all
php artisan make:model Country -fc

# tinker
 php artisan tinker