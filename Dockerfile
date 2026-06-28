FROM serversideup/php:8.3-fpm-nginx

# Set environment variables for Server Side Up Laravel Automations
ENV AUTORUN_ENABLED=true
ENV AUTORUN_LARAVEL_MIGRATION=true
ENV AUTORUN_LARAVEL_MIGRATION_FORCE=true
ENV AUTORUN_LARAVEL_CONFIG_CACHE=true
ENV AUTORUN_LARAVEL_ROUTE_CACHE=true
ENV AUTORUN_LARAVEL_VIEW_CACHE=true

# Set working directory
WORKDIR /var/www/html

# Copy application files (with correct permissions)
COPY --chown=webuser:webuser . .

# Install Composer dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Expose Nginx default port
EXPOSE 8080
