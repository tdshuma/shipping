FROM php:apache
RUN apt-get update && apt-get install -y \
  libicu-dev \
  libmcrypt-dev \
  git \
  zip \
  unzip \
  && rm -r /var/lib/apt/lists/*

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY ./app /var/www/html
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN chgrp -R www-data /var/www/html
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 0775 /var/www/html
RUN sed -i -e "s/html/html\/public/g" /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod rewrite
RUN composer install
WORKDIR /var/www/html