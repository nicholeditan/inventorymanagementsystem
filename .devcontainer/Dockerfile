
FROM mcr.microsoft.com/devcontainers/php:8.4-bookworm

# Install additional extensions needed for Laravel.
# SQLite support is already available in the base image.

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       libicu-dev libonig-dev libzip-dev \
    && docker-php-ext-install -j2 \
       bcmath intl mbstring pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*