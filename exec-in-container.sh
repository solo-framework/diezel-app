#!/bin/bash

SERVICE=dizel-web-php73

if [ -z `docker ps -q --no-trunc | grep $(docker-compose ps -q ${SERVICE})` ]; then
  # it's not running
  docker-compose run --rm ${SERVICE} bash -c "$@"
else
  # it's running
  docker-compose exec ${SERVICE} bash -c "$@"
fi