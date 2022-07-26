FROM php:7.4-fpm

# Copy composer.lock and composer.json into the working directory
#COPY composer.lock composer.json /var/www/html/ Mỹ comment code

# Set working directory
WORKDIR /var/www/html/

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions for php
RUN docker-php-ext-install mysqli pdo pdo_mysql gd bcmath
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install composer (php package manager)
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer mỹ comment code

# Copy existing application directory contents to the working directory
COPY . /var/www/html

# Assign permissions of the working directory to the www-data user
RUN chown -R www-data:www-data /var/www/html/

# Expose port 9000 and start php-fpm server (for FastCGI Process Manager)
EXPOSE 9000
CMD ["php-fpm"]



