
up::
	cd ops && \
	docker compose up -d db php nginx && docker compose logs -f

down::
	cd ops && \
	docker-compose down

enter-app::
	cd ops && \
	docker-compose exec php /bin/bash
