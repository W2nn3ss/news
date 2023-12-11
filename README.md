## Развертывание приложения

Для развертывания приложения необходимо получить данные приложения из репозитория GitHub с помощью кнопки "Code".

После того, как все файлы из репозитория будут скачены, необходимо открыть консоль и выполнить следующие команды:

```bash
composer install
```
```bash
php artisan initialize:env
```
```bash
php artisan key:generate
```
```bash
php artisan jwt:secret
```
**Composer install** Установит зависимости.  
**php artisan initialize:env** скопирует файл .env.example и создаст файл .env.  
**php artisan key:generate** сгенерирует ключ для приложения Laravel и добавит его в файл .env.
**php artisan jwt:secret** сгенерирует ключ для jwt-токена и добавит его в файл .env.

## Правки файла .env
Откройте файл .env и установите настройки БД. Внесите следующие изменения:
```bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Следом необходимо выполнить миграции, чтобы установились нужные таблицы в базу данных
```shell
php artisan migrate
```
Так же, если необходимо сделать тестовые данные, стоит выполнить сидеры:
```bash
php artisan db:seed --class=UserSeeder
```
и
```bash
php artisan db:seed --class=NewsSeeder
```
## Список роутов:
1. GET /api/v1/news - получить список новостей
2. GET /api/v1/news/{id} - получить новость по id
3. POST /api/v1/auth/login - авторизация и получения токена JWT
4. POST /api/v1/news - добавление новости, работает только с авторизацией, поля: title, text, author
5. PUT /api/v1/news/{id} - изменения новости, работает только с авторизацией, поля: title, text, author
6. DELETE /api/v1/news/{id} - удаление новости
7. POST /api/v1/register - добавление пользователя, поля: name, email, password, password_confirmation

