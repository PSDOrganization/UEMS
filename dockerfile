# Use the official PHP with Apache image
FROM php:apache

# Install MySQL extension for PHP
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_mysql

# Other installations or configurations go here

# Set the working directory
WORKDIR /var/www/html

# Copy the content of your project into the container
COPY . .

# Copy the entry script into the container
COPY entry.sh .

# Set executable permissions for the entry script
RUN chmod +x entry.sh

# Expose port 80
EXPOSE 80

# Set the entry script as the default command
CMD ["./entry.sh"]
