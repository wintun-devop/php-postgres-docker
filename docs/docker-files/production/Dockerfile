FROM almalinux:10

ENV PHP_VERSION=8.4

# Install required tools and repositories
RUN dnf -y update && \
    dnf -y install epel-release && \
    dnf -y install https://rpms.remirepo.net/enterprise/remi-release-10.rpm && \
    dnf -y install dnf-utils && \
    dnf module reset php -y && \
    dnf module enable php:remi-${PHP_VERSION} -y && \
    dnf -y install php \
    httpd \
    php-cli \
    php-fpm \
    php-mysqlnd \
    php-pgsql \
    php-opcache \
    php-xml \
    php-mbstring \
    php-curl \
    php-gd \
    php-json && \
    dnf clean all

# Apache config to proxy PHP to PHP-FPM
RUN echo "ServerName localhost" >> /etc/httpd/conf/httpd.conf && \
    echo 'AddType application/x-httpd-php .php' >> /etc/httpd/conf/httpd.conf && \
    echo 'DirectoryIndex index.php index.html' >> /etc/httpd/conf/httpd.conf && \
    echo '<FilesMatch \.php$>' >> /etc/httpd/conf/httpd.conf && \
    echo '    SetHandler "proxy:unix:/run/php-fpm/www.sock|fcgi://localhost"' >> /etc/httpd/conf/httpd.conf && \
    echo '</FilesMatch>' >> /etc/httpd/conf/httpd.conf

# Ensure PHP-FPM socket directory exists
RUN mkdir -p /run/php-fpm && \
    chown apache:apache /run/php-fpm

# Create a startup script to launch both services
COPY start.sh /start.sh
RUN chmod +x /start.sh


EXPOSE 80 443

CMD ["/start.sh"]
