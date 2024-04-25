up: # Разворачивание и запуск
	@echo 'Запуск Docker'
	docker-compose down
	cp .env.example .env
	cp ./backend/php-laravel/.env.example ./backend/php-laravel/.env
	cp ./backend/admin-php-laravel/.env.example ./backend/admin-php-laravel/.env
	cd ./frontend/app-vue && npm install
	cd ./frontend/app-nuxt && npm install

	@echo 'Собираю основной проект'
	docker-compose up -d --build
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
