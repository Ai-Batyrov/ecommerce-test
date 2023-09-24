# Ecommerce Test Assignment
## Author - Aibolat Batyrov
[Telegram](https://t.me/aibolat_batyrov)

## Для тестирования
Для локальной работы нужно клонировать репозиторий.

## Запуск приложения
1. Установить пакеты
    ```shell
    composer install
    ```
2. Поднять Docker Compose через Laravel Sail
    ```shell
    vendor/bin/sail up -d
    ```
3. Установать клиент Passport
    ```shell
    php artisan passport:install
    ```
4. Запускать миграции
    ```shell
    php artisan migrate
    ```
5. Кэшировать концфигурации
    ```shell
    php artisan optimize
   ```
6. Запускать тесты
    ```shell
    php artisan test
    ```
   
## API Documentation
Можете посмотреть API data flow в Postman.

[Ссылка на коллекцию](https://elements.getpostman.com/redirect?entityId=24061165-51924c2c-9bed-4d87-918d-c26061d802f0&entityType=collection)

[Ссылка на скачиванию JSON](https://api.postman.com/collections/24061165-51924c2c-9bed-4d87-918d-c26061d802f0?access_key=PMAT-01HB3AN8HRME1VP2WKNTA8TWNA)


## Технические подробности

- Реализован философия `Domain Driven Design`. Бизнес логики сгруппированы в отдельные домены. Домены:
   - `Auth`
   - `Order`
   - `Product`
- Использован понятие модель ориентированный `Repository`. Базируется на конкретной моделки `Eloquent`.
- Для авторизации к некоторым бизнес задачам использован понятие Laravel - `Policy`.
- Для аутентификации использован пакет `Passport`