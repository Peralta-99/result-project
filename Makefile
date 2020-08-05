docker-up:
	@sudo docker-compose up -d

docker-down:
	@sudo docker-compose down

docker-build:
	@sudo docker-compose up --build -d

test:
	@sudo docker exec site_php-cli_1 vendor/bin/phpunit --colors=always

work:
	@php artisan queue:work

perm:
	sudo chown ${USER}:${USER} bootstrap/cache -R
	sudo chown ${USER}:${USER} storage -R
	sudo chmod 777 storage -R
