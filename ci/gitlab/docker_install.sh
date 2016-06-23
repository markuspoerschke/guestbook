#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && [[ ! -e /.dockerinit ]] && exit 0

set -xe

# Install git (the php image doesn't have it) which is required by composer
echo "Install git"
apt-get update -yqq
apt-get install git -yqq

# Install composer
echo "Install composer"
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install pdo_mysql
echo "Install pdo_mysql"
docker-php-ext-install pdo pdo_mysql
