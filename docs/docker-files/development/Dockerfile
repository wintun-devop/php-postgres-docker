FROM almalinux:10

# Set environment variables
ENV PHP_VERSION=8.4

# Install required tools and repositories
RUN dnf -y update && \
    dnf -y install epel-release && \
    dnf -y install https://rpms.remirepo.net/enterprise/remi-release-10.rpm && \
    dnf -y install dnf-utils && \
    dnf module reset php -y && \
    dnf module enable php:remi-${PHP_VERSION} -y && \
    dnf -y install php \
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

# Verify installation
RUN php -v

# Set working directory
WORKDIR /var/www/html

# Copy your app (optional)
COPY ./src  /var/www/html

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]