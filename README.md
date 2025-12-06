# Bare Metal PHP

Welcome to your new Bare Metal PHP application! This is a clean, minimal installation ready for you to build upon.

## Installation

This project was created using:

```bash
composer create-project elliotanderson/baremetal my-app
```

## 🚀 Quick Start

### 1. Install Dependencies

```bash
composer install
```

### 2. Configure Environment

```bash
cp .env.example .env
```

Edit `.env` to configure your database and application settings.

### 3. Create Database

For SQLite (default):
```bash
touch database.sqlite
```

For MySQL/PostgreSQL, update your `.env` file with your database credentials.

### 4. Run Migrations

```bash
php mini migrate
```

This will create the `users` table and any other migrations you've added.

### 5. Start Development Server

```bash
php mini serve
```

Visit `http://127.0.0.1:9003` in your browser to see the welcome page!

## 📁 Project Structure

```
fresh-install/
├── app/
│   ├── Http/
│   │   └── Controllers/     # Your controllers
│   └── Models/              # Your models
├── bootstrap/               # Application bootstrap
├── config/                  # Configuration files
├── database/
│   └── migrations/         # Database migrations
├── public/                  # Web root
├── resources/
│   └── views/              # Your views
├── routes/                 # Route definitions
└── storage/                # Storage (cache, logs, etc.)
```

## 🛠️ Available Commands

- `php mini serve` - Start the development server
- `php mini migrate` - Run database migrations
- `php mini migrate:rollback` - Rollback the last migration
- `php mini make:controller Name` - Create a new controller
- `php mini make:migration name` - Create a new migration

## 📚 Next Steps

1. **Create Routes**: Edit `routes/web.php` to add your routes
2. **Create Controllers**: Use `php mini make:controller Name` or create manually in `app/Http/Controllers/`
3. **Create Models**: Add models in `app/Models/` extending `Framework\Database\Model`
4. **Create Views**: Add views in `resources/views/` and use `View::make('view-name')`
5. **Run Migrations**: Create migrations with `php mini make:migration` and run with `php mini migrate`

## Performance

### Micro-benchmarks

On my local machine (M2 Pro, PHP 8.x, macOS), I ran ApacheBench against identical routes
in multiple frameworks for 10 seconds at 100 concurrent connections:

- `/ping` (simple text)
- `/api/json` (JSON response)
- `/view` (templated HTML view)
- `/user/{id}` (parameterized route)
- `/api/process` (small CPU-bound handler)

**Average throughput (requests/second):**

- Laravel (PHP-FPM): ~268 req/s  
- BareMetalPHP (PHP-FPM): ~730 req/s  
- Laravel Octane (FrankenPHP): ~664 req/s  

From this setup:

- BareMetalPHP handled **about 2.7× more requests/sec than Laravel** when both ran on PHP-FPM.
- BareMetalPHP on plain PHP-FPM was **roughly on par with (≈10% faster than) Laravel Octane on FrankenPHP** in these micro-benchmarks.

These are simple synthetic benchmarks (no database, no cache, no real-world I/O), so they
should be treated as a rough indication of framework overhead rather than a full
production performance guarantee.

When I switched BareMetalPHP itself to FrankenPHP and re-ran the same tests
(5 seconds, 50 concurrent connections), throughput increased by ~35% compared
to BareMetalPHP on PHP-FPM. (Laravel can also be run on FrankenPHP, so this is
measuring the process model, not framework A vs framework B.)

## 📖 Documentation

For more information, visit the framework documentation.

Happy coding! 🎉


