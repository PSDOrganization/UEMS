# Use a more stable Debian version
FROM php:apache-buster

# Change repository URLs to use HTTPS
RUN sed -i 's/http:/https:/g' /etc/apt/sources.list

# Install dependencies, import GPG keys, and clean up
RUN apt-get update \
    && apt-get install -y gnupg \
    && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 0E98404D386FA1D9 6ED0E7B82643E131 F8D2585B8783D481 54404762BBB6E853 BDE6D2B9216EC7A8 \
    && apt-get install -y libpq-dev libzip-dev \
    && docker-php-ext-install mysqli pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Create directory for the project
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