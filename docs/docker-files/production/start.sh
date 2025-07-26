#!/bin/bash
/usr/sbin/php-fpm --nodaemonize --fpm-config /etc/php-fpm.conf &
exec /usr/sbin/httpd -D FOREGROUND
