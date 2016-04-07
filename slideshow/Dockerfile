FROM php:5.6-apache
RUN apt-get update && apt-get install -y \
    libxml2-dev \
    libc-client2007e-dev \
    heimdal-dev
    
# PHP-IMAP
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-install -j$(nproc) imap

# PHP-XML-RPC
RUN docker-php-ext-install -j$(nproc) xmlrpc
