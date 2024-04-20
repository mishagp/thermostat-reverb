# Quickstart!

## Setup
Install Redis or another (ideally in-memory) cache backend and configure it in your .env file.

Install composer dependencies:

```bash
composer install
```

Install NPM dependencies:

```bash
npm install
```

Copy .env.example to .env and set your environment variables:

```bash
cp .env.example .env
```

Generate an application key:

```bash
php artisan key:generate
```

Run the database migrations:

```bash
touch database/database.sqlite
php artisan migrate
```

Run one-time Reverb setup:

```bash
php artisan reverb:install
```

## Run it

Run Reverb websocket server:

```bash
php artisan reverb:start --debug
```

Run the web server:

```bash
php artisan serve
```

Run Vite:

```bash
npm run dev
```

Run a queue listener:

```bash
php artisan queue:listen
```

