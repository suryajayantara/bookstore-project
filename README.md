# 1. Clone the bookstore-project repository
git clone https://github.com/suryajayantara/bookstore-project.git

# 2. Navigate to the cloned repository
cd bookstore-project

# 3. Install the dependencies using Composer
composer install

# 4. Create a .env file by copying the .env.example file
cp .env.example .env

# 5. Generate an application key
php artisan key:generate

# 6. Configure your database settings in the .env file

# 7. Run the migration to set up the database schema and running seeders
php artisan migrate --seed

# 8. Start the development server
php artisan serve