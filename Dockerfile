# Imagem do Concursos: Nginx + PHP-FPM (serversideup/php), código e vendor.
# Configuração do PHP/Nginx por variáveis de ambiente (PHP_UPLOAD_MAX_FILE_SIZE,
# NGINX_CLIENT_MAX_BODY_SIZE etc.), definidas no compose de deploy.
# A tag de minor (8.2) recebe as correções de segurança do PHP a cada rebuild.
# Os assets (public/css, public/js) são compilados pelos devs e versionados: não há build de Node aqui.
FROM serversideup/php:8.2-fpm-nginx-alpine

# Dependências PHP primeiro, para aproveitar o cache de build.
# Inclui as de desenvolvimento: os seeders da homologação usam o Faker.
COPY --chown=www-data:www-data composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --no-scripts --no-autoloader

COPY --chown=www-data:www-data . .
RUN composer dump-autoload --optimize \
    && ln -sfn /var/www/html/storage/app/public public/storage
