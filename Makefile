up: # Разворачивание и запуск
	@echo 'Запуск Docker'
	cp .env.example .env
	cp ./backend/php-laravel/.env.example ./backend/php-laravel/.env
	cp ./craft-admin/.env.example ./craft-admin/.env
	@if [ ! -d "data" ]; then \
		mkdir data; \
	fi
	@echo 'Устанавливаю зависимости'
	cd ./craft-admin && composer install
	cd ./craft-admin && php artisan key:generate
	@echo 'Выдаю права'
	sudo chmod -R 775 ./data
	cd ./craft-admin && sudo chown -R www-data:www-data storage
	cd ./craft-admin && sudo chmod -R 775 storage
	@echo 'Собираю основной проект'
	docker-compose up -d --build
	@echo 'Подключение craftable'
	make craft
	make migrate
	@echo 'Проект собран'
	@echo 'Основное приложение: http://localhost:80/'
	@echo 'Админка: http://localhost:8010/admin'

front: # сборка фротна. Js собирается на железе (так быстрее), css внутри контейнера (потому что есть проблемы с библиотекой Node Sass)
	cd ./craft-admin && npm run craftable-pro:build
	@echo 'Фронт пересобран'

craft: # сборка фротна. Js собирается на железе (так быстрее), css внутри контейнера (потому что есть проблемы с библиотекой Node Sass)
	cd ./craft-admin && composer config repositories.craftable-pro composer https://packages.craftable.pro/
	cd ./craft-admin && composer require brackets/craftable-pro
	docker exec -it craft-admin php artisan craftable-pro:install
	cd ./craft-admin && npm install
	make front
	cd ./craft-admin && sudo chmod -R 777 resources

migrate: # провести миграции
	docker exec -it craft-admin php artisan migrate
	docker exec -it php-laravel-backend php artisan migrate
