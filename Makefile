up: # Разворачивание и запуск
	@echo 'Запуск Docker'
	cp .env.example .env
	cp ./backend/php-laravel/.env.example ./backend/php-laravel/.env
	cp ./backend/admin-php-laravel/.env.example ./backend/admin-php-laravel/.env
	@if [ ! -d "data" ]; then \
		mkdir data; \
	fi
	@echo 'Собираю основной проект'
	docker-compose up -d --build
	@echo 'Подключение craftable'

	@echo 'Устанавливаю зависимости'
	docker exec -it php-laravel-backend composer install
	docker exec -it admin-php-laravel-backend composer install
	docker exec -it php-laravel-backend php artisan key:generate
	docker exec -it admin-php-laravel-backend php artisan key:generate
	@echo 'Выдаю права'
	sudo chmod -R 775 ./data
	docker exec -it php-laravel-backend chown -R www-data:www-data storage
	docker exec -it admin-php-laravel-backend chown -R www-data:www-data storage
	docker exec -it php-laravel-backend chmod -R 775 storage
	cdocker exec -it admin-php-laravel-backend chmod -R 775 storage

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
