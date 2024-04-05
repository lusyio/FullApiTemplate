up: # Разворачивание и запуск
	@echo 'Запуск Docker'
	cp .env.example .env
	cp ./backend/php-laravel/.env.example ./backend/php-laravel/.env
	cp ./backend/admin-php-laravel/.env.example ./backend/admin-php-laravel/.env
	@if [ ! -d "data" ]; then \
		mkdir data; \
	fi
	@echo 'Устанавливаю зависимости'
	cd ./backend/php-laravel && composer install
	cd ./backend/admin-php-laravel && composer install
	cd ./backend/php-laravel && php artisan key:generate
	cd ./backend/admin-php-laravel && php artisan key:generate
	@echo 'Выдаю права'
	sudo chmod -R 775 ./data
	cd ./backend/php-laravel && sudo chown -R www-data:www-data storage
	cd ./backend/admin-php-laravel && sudo chown -R www-data:www-data storage
	cd ./backend/php-laravel && sudo chmod -R 775 storage
	cd ./backend/admin-php-laravel && sudo chmod -R 775 storage
	@echo 'Собираю основной проект'
	docker-compose up -d --build
	@echo 'Подключение craftable'
	make migrate
	make seed
	@echo 'Проект собран'
	@echo 'Основное приложение: http://localhost:80/'
	@echo 'Админка: http://localhost:8010/admin'


migrate: # провести миграции
	docker exec -it php-laravel-backend php artisan migrate
	docker exec -it admin-php-laravel-backend php artisan migrate

seed:
	docker exec -it php-laravel-backend php artisan migrate:refresh
	docker exec -it admin-php-laravel-backend php artisan migrate:refresh
	docker exec -it php-laravel-backend php artisan db:seed
