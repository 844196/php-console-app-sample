FROM php:7.2.12-cli-alpine3.8

LABEL "com.github.actions.name"="GitHub Action for composer"
LABEL "com.github.actions.description"="Run composer command"
LABEL "com.github.actions.icon"="package"

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
