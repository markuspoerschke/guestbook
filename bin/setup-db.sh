#!/usr/bin/env bash

set -e

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

${DIR}/wait-for-it.sh ${GUESTBOOK_DB_HOST}:3306 -t 60
php ${DIR}/load-schema.php
