
up::
	cd ops && \
	docker compose up -d db php nginx && \
	docker-compose exec php composer install && \
	docker-compose exec php php bin/console doctrine:database:create --if-not-exists && \
	docker-compose exec php php bin/console cache:clear && \
	docker-compose exec php vendor/bin/phinx migrate -e development && \
	docker compose logs -f

down::
	cd ops && \
	docker-compose down

enter-app::
	cd ops && \
	docker-compose exec php /bin/bash

enter-db::
	cd ops && \
	docker-compose exec db /bin/bash

tests::
	cd ops && \
	docker-compose exec php vendor/bin/phpunit
