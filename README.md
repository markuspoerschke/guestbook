# Guestbook Sample Application

This project demonstrates a best practice, how to setup a PHP project.
For simplicity reasons, it uses Apache PHP module and only a single database.
Tests are interacting with the database and everything from build to test runs inside docker.
Therefore, the only requirements for running this projects are Docker and Make (>=4.4, better install with Brew).

## Work with this project

```bash
# Build the needed Docker images and install the composer dependencies.
# This target needs to be executed before start, test, or fix can be run.
make build

# Once the Docker images are built, the composer dependencies can also be updated running
make vendor

# To start the application (in background), run the following command
make start

# Then run this command to open the project in your browser
make open

# When finished, stop the application
make stop

# Or remove all data (including, container and volumes)
make clean

# Execute tests
make test

# Fix code style
make fix

# Open a shell in the build container
make shell
```

## CI Services

### Travis

Website: https://travis-ci.org

[![Build Status](https://travis-ci.org/markuspoerschke/guestbook.svg?branch=master)](https://travis-ci.org/markuspoerschke/guestbook)

### CircleCI

Website: https://circleci.com

[![CircleCI](https://circleci.com/gh/markuspoerschke/guestbook.svg?style=svg)](https://circleci.com/gh/markuspoerschke/guestbook)

### GitLab CI

Website: https://gitlab.com

[![pipeline status](https://gitlab.com/markuspoerschke/guestbook/badges/master/pipeline.svg)](https://gitlab.com/markuspoerschke/guestbook/commits/master)

### scrutinizer

[![Build Status](https://scrutinizer-ci.com/g/markuspoerschke/guestbook/badges/build.png?b=master)](https://scrutinizer-ci.com/g/markuspoerschke/guestbook/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/markuspoerschke/guestbook/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/markuspoerschke/guestbook/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/markuspoerschke/guestbook/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/markuspoerschke/guestbook/?branch=master)

### Coveralls

[![Coverage Status](https://coveralls.io/repos/github/markuspoerschke/guestbook/badge.svg?branch=master)](https://coveralls.io/github/markuspoerschke/guestbook?branch=master)

### Code Climate

[![Maintainability](https://api.codeclimate.com/v1/badges/e88ad42098c513d3fb2d/maintainability)](https://codeclimate.com/github/markuspoerschke/guestbook/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/e88ad42098c513d3fb2d/test_coverage)](https://codeclimate.com/github/markuspoerschke/guestbook/test_coverage)
