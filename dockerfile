FROM debian:bullseye-slim

# Install PHP with Apache and required extensions
RUN apt-get update && apt-get install -y \
    apache2 \
    libapache2-mod-php \
    php-mysql \
    php-zip \
    php-gd \
    php-dev \
    mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN pecl install zip && docker-php-ext-enable zip

# Copy the content of your project into the container
COPY . /var/www/html

# Copy the entry script into the container
COPY entry.sh /var/www/html/entry.sh

# Set executable permissions for the entry script
RUN chmod +x /var/www/html/entry.sh

# Expose port 80
EXPOSE 80

# Set the entry script as the default command
CMD ["/var/www/html/entry.sh"]
