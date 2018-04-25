# TrainingDocker

Add '127.0.0.1 be.docker' in hosts file.

Run 'docker-compose build' for build containers.
Run 'docker-compose up' for up app.


Run 'make install' for install dependencies and init database.

# For production

Add '127.0.0.1 be.docker' in hosts file.

Run 'docker-compose -f prod-docker-compose.yml build' for build containers.
Run 'docker-compose -f prod-docker-compose.yml up' for up app.


Run 'make install-prod' for install dependencies and init database.

For elastic db
mysql -uroot -p -h127.0.0.1 -P 3307 be_db  < ./docker/elastic/mysql.sql
