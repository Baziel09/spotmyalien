#!/bin/bash
# This script should be run on the server after deployment

# Go to the application directory (use absolute path)
APP_DIR="/data/sites/web/productionserverbe/subsites/spotmyalien.be/degrotebeer"
if [ ! -d "$APP_DIR" ]; then
    echo "Error: Directory $APP_DIR does not exist."
    exit 1
fi
cd "$APP_DIR" || exit 1

# Set proper permissions
find storage -type d -exec chmod 775 {} \;
find storage -type f -exec chmod 664 {} \;
chmod 775 bootstrap/cache

# If this is the first deployment, copy the environment file
if [ ! -f .env ]; then
    cp .env.production.example .env
    # Generate application key
    php artisan key:generate
    echo "Please configure your .env file with the correct database credentials and other settings"
    exit 1  # Exit to allow manual configuration of .env
fi

# Run migrations first (creates database tables)
php artisan migrate --force

# Now clear caches (tables should exist)
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Optimize
php artisan optimize

echo "Deployment completed successfully!"