#!/bin/bash
#docker-compose exec dizel-app-php73 bash -c "$@"

#docker-compose run --rm dizel-app-php73 bash -c "$@"

SERVICE=dizel-web-php73

if [ -z `docker ps -q --no-trunc | grep $(docker-compose ps -q ${SERVICE})` ]; then
  # it's not running
  docker-compose run --rm ${SERVICE} bash -c "$@"
else
  # it's running
  docker-compose exec ${SERVICE} bash -c "$@"
#  docker-compose exec ${SERVICE} bash -c "$@"
fi

#
#
#ISRUNNING=$(docker inspect -f '{{.State.Running}}' ${SERVICE})
#
#if [[ "$ISRUNNING" == "true" ]]; then
#	docker exec -it ${SERVICE} bash -c "$@"
#else
#	docker run --rm --name ${SERVICE} -v $(pwd):/app ${SERVICE} bash -c "$@"
#fi