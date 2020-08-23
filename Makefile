SHELL := /bin/bash
MK_FILE_DIR=$(dir $(realpath $(firstword $(MAKEFILE_LIST))))

-include .env.local
-include .env

start:
	docker-compose up -d

install:
	cp .env .env.local ;\
	make start

down:
	docker-compose down

php:
	docker-compose exec php bash

# restart docker compose
dk-rs:
	docker-compose down && docker-compose up -d

# stop all containers, pull updates for images and restart
dk-update:
	docker-compose down ;\
	docker-compose pull ;\
# remove volume as it's being cached
	docker volume prune -f || true ;\
	docker-compose up -d ;\

# Clear unused images/volumes/containers
dk-clean:
# remove unused containers
	docker ps -qa --no-trunc --filter "status=exited" | xargs docker rm || true ;\
# remove unused images
	docker images -f "dangling=true" -q | xargs docker rmi || true ;\
# remove unused volumes
	docker volume prune -f || true ;\

update-sf: disable-xdebug
	make composer-install ;\
	make migrate ;\

# BO recreate database, run migrations
reset-sf: disable-xdebug
	make composer-install ;\
	make reset-db;\

# xdebug causes performance issues, disable it for commands,migrations etc
disable-xdebug:
	docker-compose exec php bash -c "dxd || true" ;\

enable-xdebug:
	docker-compose exec php bash -c "exd || true" ;\

composer-install:
	docker-compose exec php composer install ;\

quality:
	docker-compose exec -T php vendor/bin/codecept run unit ;\
	docker-compose exec -T php vendor/bin/phpstan analyse ;\
	docker-compose exec -T php vendor/bin/ecs check --fix ;\

install-git-hook:
	ln -s -f $(MK_FILE_DIR)bin/code_quality.sh .git/hooks/pre-push ;\

list:
	docker-compose ps

type:
	docker-compose exec -T php vendor/bin/phpstan analyse ;\

test-integration:
	docker-compose exec -T php vendor/bin/codecept run integration ;\
