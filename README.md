### Getting Started

If you are using docker-compose copy .env.container.example to the RaceAlert directory
and run:

```$ docker-compose up -d```

```$ docker-compose exec php-fpm php artisan migrate --seed```

Navigate to http://localhost:8888/

Mailhog is available on http://localhost:8889/

For logs run:
```docker-compose logs -f``` or

```docker-compose logs <service> -f```

Service names are defined in docker-compose.yml