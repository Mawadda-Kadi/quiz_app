## Open the browser
php artisan serve

## To migrate
php artisan migrate

## create .env manually when needed:
bash: cp .env.example .env
php artisan key:generate
touch database/database.sqlite

.env
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
DB_DATABASE=/workspace/quiz_app/database/database.sqlite
# DB_USERNAME=root
# DB_PASSWORD=

bash: php artisan migrate



## Option 2: Store a Backup in a Safe Place
bash: cp .env ~/backup_env.txt

### To restore:
bash: cp ~/backup_env.txt .env
