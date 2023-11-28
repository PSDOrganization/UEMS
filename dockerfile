# Use the official PHP with Apache image
FROM php:apache

# Add missing GPG keys
RUN apt-get update && apt-get install -y gnupg
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 0E98404D386FA1D9 6ED0E7B82643E131 F8D2585B8783D481 54404762BBB6E853 BDE6D2B9216EC7A8

# Continue with the installation
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_mysql

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
