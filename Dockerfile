FROM python:3.12-slim
WORKDIR /app
COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt
COPY . .
RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    libapache2-mod-php \
    && apt-get clean
RUN a2enmod rewrite
RUN mkdir -p /var/log/apache2 /var/log/python-api
COPY web/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html
EXPOSE 5000 80
RUN apt-get install -y supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
CMD ["/usr/bin/supervisord"]
