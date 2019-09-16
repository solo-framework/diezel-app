#!/bin/bash

PARAM="$@"
./exec-in-container.sh "export APP_CONFIG=/app/config/cli.dev.php APP_DEBUG_MODE=true && cd /app/apps/console && php ./cli.php ${PARAM}"