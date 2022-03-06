##Setup Instructions


Install dependencies
```
composer install
``` 

Copy .env file  for configurations

```
cp .env.example .env
```

Generate app key
```
php artisan key:generate
```

Database migration
```
php artisan migrate
```

NPM install

```
npm install && npm run dev
```

add weather api key to .env

```
WEATHER_API_KEY=api key
```

Run the local test server

```
php artisan serve
```