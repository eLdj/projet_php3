FROM phpdockerio/php73-fpm:latest

ADD . /application/public
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive
