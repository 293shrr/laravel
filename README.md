## Установка

1. Клонируй репозиторий:
    ```bash
    git clone https://github.com/твое_имя/bookshop.git
    cd bookshop
    ```

2. Установи зависимости:
    ```bash
    composer install
    npm install && npm run build
    ```

3. Настрой `.env`:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Настрой подключение к базе данных в `.env`, затем выполни миграции:
    ```bash
    php artisan migrate
    ```

5. Запусти сервер:
    ```bash
    php artisan serve
    ```