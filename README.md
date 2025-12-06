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

## 📖 Documentation

For more information, visit the framework documentation.

Happy coding! 🎉

