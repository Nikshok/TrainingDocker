DC=docker-compose
CONSOLE=php -d memory_limit=-1 bin/console
EXEC=$(DC) exec php bash
EXEC-TTY=$(DC) exec -T php $(CONSOLE)
EXEC-TTY-PROD=$(DC) exec -T web $(CONSOLE)

#For dev
install: composer db-install

db-install:
	$(EXEC-TTY) doctrine:database:drop --if-exists --force
	$(EXEC-TTY) doctrine:database:create
	$(EXEC-TTY) doctrine:migration:migrate

composer:
	$(DC) exec php composer install

#For prod
install-prod: composer-prod db-install-prod

db-install-prod:
	$(EXEC-TTY-PROD) doctrine:database:drop --if-exists --force
	$(EXEC-TTY-PROD) doctrine:database:create
	$(EXEC-TTY-PROD) doctrine:migration:migrate

composer-prod:
	$(DC) exec web composer install