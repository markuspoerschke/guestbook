.PHONY: build
build:
	composer install

.PHONY: test
test: build
	composer test

.PHONY: fix
fix: build
	composer fix
