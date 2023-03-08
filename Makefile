export SHELL:=/bin/bash
export SHELLOPTS:=$(if $(SHELLOPTS),$(SHELLOPTS):)pipefail:errexit

.ONESHELL:

.PHONY: help
help:
	@echo "Guestbook project Makefile supports the following phony commands:"
	@echo "  build		builds the docker images for the local environment and installs composer dependencies"
	@echo "  clean		stops the application and removes the container and composer vendor directory"
	@echo "  fix		fix code style"
	@echo "  open		opens the local running app in the browser"
	@echo "  restart	restarts the application"
	@echo "  shell		opens a shell into the build container"
	@echo "  start		starts the application using the docker-compose.yaml file"
	@echo "  stop		stops the application (without deleting any data)"
	@echo "  test		run tests"

.PHONY: start
start: vendor
	docker compose up -d

.PHONY: stop
stop:
	docker compose stop

.PHONY: clean
clean:
	rm -rf vendor .phpunit.cache build .php-cs-fixer.cache .phpunit.result.cache
	docker compose down
	$(MAKE) test-clean

.PHONY: open
open:
	open http://localhost:`docker compose port app 80 | cut -d':' -f2`

.PHONY: restart
restart:
	$(MAKE) stop
	$(MAKE) start

.PHONY: build
build:
	docker compose -f docker-compose.yaml -f docker-compose.test.yaml build
	$(MAKE) vendor

vendor: composer.json composer.lock
	docker compose run --rm build composer install

.PHONY: test
test: vendor
	function tearDown {
		$(MAKE) test-clean
	}
	trap tearDown EXIT
	docker compose -f docker-compose.test.yaml up --exit-code-from app-test

.PHONY: test-clean
test-clean:
	docker compose -f docker-compose.test.yaml down

.PHONY: fix
fix:
	docker compose run --rm build composer fix

.PHONY: shell
shell:
	docker compose exec build bash
