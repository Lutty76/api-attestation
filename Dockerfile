FROM richarvey/nginx-php-fpm:1.10.3


COPY --chown=nginx:nginx . /var/www/html/
COPY --chown=nginx:nginx nginx-symfony.conf /etc/nginx/sites-enabled/


RUN rm -f /etc/nginx/sites-enabled/default.conf
RUN rm -f /var/www/html/index.php