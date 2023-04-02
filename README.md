# Clone the bookstore-project repository
git clone https://github.com/suryajayantara/bookstore-project.git

# Navigate to the cloned repository
cd bookstore-project

# Install the dependencies using Composer
composer install

# Create a .env file by copying the .env.example file
cp .env.example .env

# Generate an application key
php artisan key:generate

# Configure your database settings in the .env file

# Run the migration to set up the database schema and running seeders
php artisan migrate --seed

# Start the development server
php artisan serve