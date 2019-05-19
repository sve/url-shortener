Installation
------------

Run containers:
```
docker-compose up -d
```

Enter the workspace container:
```
docker-compose exec php zsh
```

Create your local ```.env``` config:  
```
cp .env.example .env
```
```
php atisan key:generate
```

Install dependencies:
```
composer install
```

```
yarn install
```

Run migrations:
```
php artisan migrate
```

Compile assets:
```
npm run dev
```

Add following lines to your local ```/etc/hosts```:
```
127.0.0.1 url-shortener.dev
127.0.0.1 api.url-shortener.dev
127.0.0.1 admin.url-shortener.dev
```

Usage
----------
[Open](http://url-shortener.dev:8081) in your web browser.

Tests
-----

Run ```./vendor/bin/phpunit``` inside ```php``` container

Documentation
-------------
- [Public API](http://url-shortener.dev:8081/api/documentation/index.html)
- [Private API](http://url-shortener.dev:8081/api/private/documentation/index.html)


