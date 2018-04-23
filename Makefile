DC=docker-compose
CONSOLE=php -d memory_limit=-1 bin/console
EXEC=$(DC) exec -T php bash
EXEC-TTY=$(DC) exec -T php $(CONSOLE)

install: composer db-install

db-install:
	$(EXEC-TTY) doctrine:database:drop --if-exists --force
	$(EXEC-TTY) doctrine:database:create
	$(EXEC-TTY) doctrine:migration:migrate

composer:
	$(EXEC)
	composer install