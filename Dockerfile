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

# Apache Config
RUN echo "ServerName localhost" >> /etc/httpd/conf/httpd.conf && \
    echo "AddType text/html .php" >> /etc/httpd/conf/httpd.conf && \
    echo "DirectoryIndex index.php index.html" >> /etc/httpd/conf/httpd.conf && \
    echo "PHPIniDir /usr/local/lib" >> /etc/httpd/conf/httpd.conf

EXPOSE 80 443

CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
