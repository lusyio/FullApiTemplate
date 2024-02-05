setup:
	@make build
	@make up 
	@make composer-update
build:
	docker compose build 
stop:
	docker compose stop
up:
	docker compose up -d

composer-update:
	docker exec template_backend bash -c "composer update"
	docker exec template_backend bash -c "php artisan key:generate"
	
optimize:
	docker exec template_backend bash -c "php artisan optimize:fresh"
data:
	docker exec template_backend bash -c "php artisan migrate:fresh --seed"

bash:
	docker exec -it template_backend bash

fresh:
	docker compose restart
rmi:
	docker image rm -f template_backend-template_backend
logs: 
	docker logs -f template_backend

# backup_db: 
	# docker exec mysql_db bash -c "./home/backups/backup_script.sh"
