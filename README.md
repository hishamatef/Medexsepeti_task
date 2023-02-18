# Medexsepeti task
## Installation
```
git clone https://github.com/hishamatef/tl_bk_task.git
cp .env.example .env
```
- Create medexsepeti_task DB
- Update .env with your db  credentials
- then run the following commands
```
composer install
php artisan key:generate
php artisan migrate:fresh --seed
```
- now you are ready to serve
```
php artisan serve
```
