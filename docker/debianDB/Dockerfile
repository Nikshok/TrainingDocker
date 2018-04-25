FROM debian:stretch

RUN apt-get update

RUN apt-get install -y --no-install-recommends \
    apt-utils \
    nano \
    mysql-server=5.5* \
    mysql-client=5.5*

ADD init.sh /init.sh
RUN chmod 755 /*.sh
ENTRYPOINT ["/init.sh"]

EXPOSE 3306
CMD ["/usr/bin/mysqld_safe"]