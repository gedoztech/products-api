build:
	cp .env.example .env
	docker-compose build --no-cache --force-rm
	@make up

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