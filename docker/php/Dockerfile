# Используем официальный образ PHP 8.3 с поддержкой FPM
FROM php:8.3-fpm

MAINTAINER Alseksei Tikhomirov <alex@rwsite.ru>

# Устанавливаем необходимые расширения PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    unzip \
    git \
    curl \
    zip \
    libxslt1-dev \
    libicu-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        zip \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        mysqli \
        mbstring \
        xml \
        dom \
        exif \
        intl \
        opcache \
        simplexml \
        xsl \
    && rm -rf /var/lib/apt/lists/*

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add Composer to the PATH
ENV PATH="$PATH:/usr/local/bin"

# Указываем рабочую директорию для PHP
WORKDIR /var/www

# Устанавливаем WP-CLI
RUN curl -L https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -o wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# Создаем группу и пользователя, если они не существуют
RUN groupadd -g ${WWWGROUP:-1000} www && \
    useradd -u ${WWWUSER:-1000} -g www -m www && \
    usermod -aG www-data,root www

# Устанавливаем права доступа
RUN chown -R www:www /var/www

# Переключаемся на пользователя www
USER ${WWWUSER:-1000}

# Открываем порт 9000 и запускаем PHP-FPM
EXPOSE 9000

# Запускаем PHP-FPM
CMD ["php-fpm"]