setup:
	@make build
	@make up 
	@make composer-update
	@make data
	cd frontend && npm install && npm run dev
build:
	docker compose build 
stop:
	docker compose stop
up:
	docker compose up -d

composer-update:
	docker exec backend bash -c "composer update --ignore-platform-reqs"
	docker exec backend bash -c "cp .env.example .env"
	docker exec backend bash -c "php artisan key:generate"
	
optimize:
	docker exec backend bash -c "php artisan optimize:fresh"
data:
	docker exec backend bash -c "php artisan migrate:fresh --seed"

bash:
	docker exec -it backend bash

fresh:
	docker compose restart
rmi:
	docker image rm -f backend-backend
logs: 
	docker logs -f backend

# backup_db: 
	# docker exec mysql_db bash -c "./home/backups/backup_script.sh"
