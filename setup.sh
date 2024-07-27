#!/bin/bash

# Update package lists
sudo apt-get update

# Install common system packages and PHP extensions
sudo apt-get install -y sqlite3 php7.4-sqlite3 php7.4-curl php7.4-common

# Install PHP dependencies with Composer
composer install
