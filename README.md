<p align="center">
  <a href="https://craftable.pro/" target="_blank" rel="noopener noreferrer"><img src="https://craftable.pro/assets/logo-white.svg" width="165" alt="Цифра"></a>
</p>

<p align="center">
  <a target="_blank" href="https://craftable.pro/">Сайт</a> |
  <a target="_blank" href="https://docs.craftable.pro/">Документация</a>
</p>


<p align="center">Репозиторий с первичным развертыванием платформы<br>Craftable PRO для Laravel
</p>
<p align="center">
<img alt="apache" src="https://img.shields.io/badge/Version-1.0-blue">
<img alt="apache" src="https://img.shields.io/badge/Vue-3.0-brightgreen.svg">
<img alt="apache" src="https://img.shields.io/badge/Laravel-10.0-red.svg">
<img alt="apache" src="https://img.shields.io/badge/PHP-8.1-informational.svg">
<img alt="apache" src="https://img.shields.io/badge/DB-PostgreSQL-success.svg">
</p>

## Установка
Для корректной работы с проектом необходимо иметь: ```npm```, ```composer```, ```docker```, ```docker-compose```. Все команды вводим в корне проекта.

1. ```make up``` (создает тома, образы и контейнеры в докере, собирает фронт)
2. Проект готов и расположен по адресу http://localhost:80/
3. В админку зайти можно http://localhost:80/admin/
4. Дефолтного админа (email - пароль) получите при сборке проекта ```make up```

## Структура проекта
1. Основное приложение (Laravel + Craftable Vue) - основная директория ```/app```, craftable vue лежит в ```/app/resources/```

## Консольные команды
1. ```make up``` создает тома, образы и контейнеры в докере, собирает фронт
2. ```make front``` - сборка только фротна. Js собирается на железе (так быстрее), css внутри контейнера (потому что есть проблемы с библиотекой Node Sass)
3. ```make craft``` -  подключение и сборка craftable pro
4. ```make migrate``` - проводит миграции в основном проекте

Все изменения на локалке будут отображаться в контейнере. Это значит:
1. Не нужно пересобирать контейнер при изменениях бэка,
2. Для пересборки фронта нужно выполнить ```make front```

## Docker
1. ```docker-compose up -d``` - запуск всех образов и контейнеров
2. ```docker ps -a``` - просмотр всех запущенных контейнеров
3. ```docker exec -it CONTAINER_NAME /bin/sh``` - зайти в контейнер с консолью bash (вместо bash можно написать любую команду на исполнение, например php artisan migrate)
4. ```docker stop CONTAINER_NAME``` - остановить определенный контейнер
5. ```docker stop $(docker ps -a -q) && docker rm $(docker ps -a -q) && docker volume rm $(docker volume ls -f dangling=true -q) && docker rmi $(docker images -a -q)``` - удалить и остановить все контейнеры, образы и тома

## Craftable PRO
1. CRUD Generator - создаем миграцию с нужной таблицей, затем вызываем ```php artisan craftable-pro:generate-crud```, после этого, как ответим на все пункт вызываем ребилд фронта ```make front```
2. Детально можно почитать в <a target="_blank" href="https://docs.craftable.pro/">документации</a>.