#!/bin/bash

# docker-compose build --force-rm && 
docker-compose up --build --remove-orphans

# docker-compose run --rm php7 php -S 0.0.0.0:9292 -t /app

# docker-compose run --rm dizel-app-php73 bash -c 'export APP_CONFIG=config/web.dev.php APP_DEBUG_MODE=true && php -S 0.0.0.0:9191 -t /app'

# IP=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' php7) && echo http://$IP:9292