# Тестовое задание для backend-стажёра в юнит Billing

Как запускать:
```
docker run -it --rm -v .:/app composer install
docker-compose up --build
docker-compose exec app php app/bin/console doctrine:schema:create
```

Запрос отправлять на `http://localhost/register`. Ссылка на страницу приходит в HTTP заголовке `Location`.
