build:
	cp .env.example .env
	docker-compose build --no-cache --force-rm
	cp .env.example api/src/.env
	@make up
	docker-compose exec api chmod -R 777 storage bootstrap/cache
	docker-compose exec api php artisan migrate

up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

stop:
	docker-compose stop

start:
	docker-compose start

restart:
	docker-compose restart