# Start from the official PHP 8.4 FPM image
FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libldap2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions
# ✅ Detectar arquitectura dinámicamente en lugar de hardcodear x86_64
RUN ARCH=$(dpkg-architecture -q DEB_HOST_MULTIARCH) \
    && docker-php-ext-configure ldap --with-libdir=lib/${ARCH}/ \
    && docker-php-ext-install -j$(nproc) ldap \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) pdo_mysql

# Set working directory
WORKDIR /var/www/html
