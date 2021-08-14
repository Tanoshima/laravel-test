FROM php:8.0.8-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN apt-get update
RUN apt-get install -y zlib1g-dev git libnss3-dev libgconf2-dev libfontconfig1-dev wget libzip-dev
RUN apt-get install -y dnsutils
RUN apt-get install -y sendmail
RUN apt-get install -y libpng-dev libmcrypt-dev libjpeg-dev libpng-dev libfreetype6-dev
RUN apt-get install -y libonig-dev

## wkhtmltopdfをインストール
RUN apt-get install -y fontconfig libjpeg62-turbo libxrender1 xfonts-75dpi xfonts-base
RUN wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.stretch_amd64.deb; dpkg -i wkhtmltox_0.12.6-1.stretch_amd64.deb

RUN rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql mysqli opcache zip bcmath
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd
RUN a2enmod rewrite

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# 最新版のcomposerを使用するためスキップ
#RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
