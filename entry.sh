#!/bin/bash
# Set file permissions at runtime
chmod -R 755 /

chmod 777 /tmp

chmod 777 /var/www/html

# Start the Apache server
apache2-foreground
