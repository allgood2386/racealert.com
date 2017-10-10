### Getting Started

If you are using docker-compose copy .env.container.example to the RaceAlert directory
and run:

```$ docker-compose up -d```

If your local version of php matches the defined version 
(or is close enough for your task) in docker-compose.yml you
can run `composer install`  locally and this is preferred. However you can run it
in the container with the following command:

```$ docker-compose exec php-fpm composer install```

```$ docker-compose exec php-fpm php artisan migrate --seed```

Navigate to http://localhost:8888/home

Mailhog is available on http://localhost:8889/home

For logs run:
```$docker-compose logs -f``` or

```$docker-compose logs <service> -f```

Service names are defined in docker-compose.yml