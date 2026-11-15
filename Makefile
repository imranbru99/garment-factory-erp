.PHONY: setup seed-demo test

setup:
	composer install
	test -f .env || cp .env.example .env
	php artisan key:generate
	touch database/database.sqlite
	php artisan migrate --force

seed-demo:
	php artisan db:seed --force

test:
	php artisan test
