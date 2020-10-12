DOCKER_COMPOSE  = docker-compose

install: ## Install dependencies
install:
	composer install

start-docker: ## Start db
start-docker:
	$(DOCKER_COMPOSE) up -d --remove-orphans --no-recreate

start: ## Start the project
start:
	php -S localhost:8000 -t public/


stop: ## Stop the project
stop:
	$(DOCKER_COMPOSE) stop

.DEFAULT_GOAL := help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help
