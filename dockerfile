# Use the official PHP with Apache image
FROM php:apache

# Install MySQL extension for PHP
RUN docker-php-ext-install mysqli pdo_mysql

# Install MySQL client (example, adjust as needed)
RUN apt-get update && apt-get install -y mysql-client

RUN mkdir -p /var/www/html

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
