

FROM phusion/baseimage:latest

MAINTAINER datnq <datnq2010@gmail.com>

RUN DEBIAN_FRONTEND=noninteractive
RUN locale-gen en_US.UTF-8

ENV LANGUAGE=en_US.UTF-8
ENV LC_ALL=en_US.UTF-8
ENV LC_CTYPE=UTF-8
ENV LANG=en_US.UTF-8
ENV TERM xterm

# Add user
ARG PGID=1000
ARG PUID=1000
RUN groupadd -g $PGID dockertest
RUN useradd -u $PUID -m -g dockertest dockertest

USER root

# Chown /var/www/html



# Add the "PHP 7" ppa
RUN apt-get install -y software-properties-common && \
    add-apt-repository -y ppa:ondrej/php

#
#--------------------------------------------------------------------------
# Software's Installation
#--------------------------------------------------------------------------
#

# Install "PHP Extentions", "libraries", "Software's"
RUN apt-get update && \
    apt-get install -y --force-yes \
        php7.0-cli \
        php7.0-common \
        php7.0-curl \
        php7.0-json \
        php7.0-xml \
        php7.0-mbstring \
        php7.0-mcrypt \
        php7.0-mysql \
        php7.0-pgsql \
        php7.0-sqlite \
        php7.0-sqlite3 \
        php7.0-zip \
        php7.0-memcached \
        php7.0-gd \
        pkg-config \
        php-dev \
        libcurl4-openssl-dev \
        libedit-dev \
        libssl-dev \
        libxml2-dev \
        xz-utils \
        libsqlite3-dev \
        sqlite3 \
        git \
        curl \
        vim \
        nano \
    && apt-get clean

#####################################
# Composer:
#####################################

# Install composer and add its bin to the PATH.
RUN curl -s http://getcomposer.org/installer | php && \
#   echo "export PATH=${PATH}:/var/www/html/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer

# Install nodejs 
RUN apt-get install -y nodejs \
    npm
RUN ln -s /usr/bin/nodejs /usr/bin/node

# Install gulp, bower 
   RUN npm install -g gulp \
   bower \
   grunt

   # RUN echo '{ "allow_root": true }' > /root/.bowerrc

# Clean up
USER root
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www/html

