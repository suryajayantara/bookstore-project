# Clone the Laravel repository
git clone https://github.com/laravel/laravel.git

# Navigate to the cloned repository
cd laravel

# Install the dependencies using Composer
composer install

# Create a .env file by copying the .env.example file
cp .env.example .env

# Generate an application key
php artisan key:generate

# Configure your database settings in the .env file

# Run the migration to set up the database schema
php artisan migrate

# Start the development server
php artisan serve