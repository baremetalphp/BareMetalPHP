# 🚀 Bare Metal PHP  
### A modern PHP framework with a Go-powered application server

BareMetalPHP is a lightweight, high-performance PHP framework designed around a simple idea:

**PHP should run fast by default — without FPM, without heavy stacks, and without hacks.**

Instead of relying on traditional PHP-FPM, BareMetalPHP includes an optional **Go application server** that manages persistent PHP workers. This provides:

- Huge performance gains over cold-start PHP  
- True parallelism (fast + slow worker pools)  
- Zero-config hot reload  
- Static asset offloading  
- A fast, modern DX similar to Node, Go, or Rust  

If you want Laravel’s experience but not Laravel’s overhead, this is your framework.

---

## ✨ Key Features

### 🟨 1. Go-Powered App Server (the BareMetal Runtime)

BareMetalPHP includes a Go runtime that functions like a lightweight alternative to Swoole or Laravel Octane:

- Persistent PHP worker pool  
- Fast + slow request classification  
- Hot reload for PHP & routes  
- Static file serving  
- Efficient Go→PHP bridge protocol  

Enable it with:

```env
APPSERVER_ENABLED=true
```

Start it with:

```bash
php mini go:serve
```

Dry run:

```bash
php mini go:serve --dry-run
```

### 🎯 2. A modern, minimal PHP framework

BareMetalPHP provides:
- Simple router
- Controller + method resolution
- PSR-7-style Request & Response
- Lightweight dependency injection container
- View layer
- Migrations + SQLite testing utilities
- `mini` CLI (generators, migrations, test tools)

It is intentionally small, readable, and fast.

### ✔️ 3. Fully tested

The framework is covered by a deterministic test suite:
- Routing, container, HTTP kernel
- Database + migrations + rollback
- Go app server installer
- Go -> PHP worker bridge

Run all tests:

```bash
vendor/bin/phpunit
```

### 🧰 Installation

Create a new BareMetalPHP project:

```bash
composer create-project baremetalphp/baremetalphp my-app
cd my-app
```

Run the built-in PHP server:

```bash
php mini serve
```

#### Install the Go application server

```bash
php mini go:install
go mod tidy
php mini go:serve
```

Default Go server URL:

```bash
http://localhost:8080
```

### ⚙️ Configuration `(config/appserver.php)`

```php
return [
    'enabled'      => env('APPSERVER_ENABLED', false),
    'fast_workers' => (int) env('APPSERVER_FAST_WORKERS', 4),
    'slow_workers' => (int) env('APPSERVER_SLOW_WORKERS', 2),
    'hot_reload'   => (bool) env('APPSERVER_HOT_RELOAD', true),

    'static' => [
        ['prefix' => '/assets/', 'dir' => 'public/assets'],
        ['prefix' => '/build/',  'dir' => 'public/build'],
        ['prefix' => '/css/',    'dir' => 'public/css'],
        ['prefix' => '/js/',     'dir' => 'public/js'],
        ['prefix' => '/images/', 'dir' => 'public/images'],
        ['prefix' => '/img/',    'dir' => 'public/img'],
    ],
];
```

The Go installer generates a matching `go_appserver.json` automatically.

### 🧩 Architecture Overview

```arduino
                   ┌──────────────────────────────┐
                   │        Go HTTP Server         │
                   │  - static files               │
     Request ─────▶│  - routing fallback           │──────────┐
                   │  - hot reload watcher         │          │
                   └──────────────────────────────┘          │
                                                             ▼
                                               ┌──────────────────────────┐
                                               │   PHP Worker Pool        │
                                               │  (persistent processes)  │
                                               └──────────────────────────┘
                                                             │
                                                             ▼
                                               ┌──────────────────────────┐
                                               │ BareMetalPHP Framework  │
                                               │  - routing               │
                                               │  - container             │
                                               │  - controllers           │
                                               │  - views                 │
                                               │  - database/migrations   │
                                               └──────────────────────────┘

```

### 📦 Commands

```bash
php mini serve
php mini make:controller Foo
php mini make:migration create_users
php mini migrate
php mini migrate:rollback

php mini install:go-appserver
php mini go:serve
php mini go:serve --dry-run
```

### 🔖 Version 0.2.0 Release Notes

- Go application server is now a first-class feature
- `go:serve` command added
- `go:install` scaffolding generator added
- `go_appserver.json` generated from PHP config
- Persistent PHP worker bridge implemented
- Better migration rollback logic
- Higher overall test coverage

### 🛣 Roadmap

- Zero-downtime worker recycling
- WebSockets via Go
- Cache subsystem
- Async jobs via Go sidecar
- API rate limiting
- Events + Subscribers
- Optional queue runner

### 🤝 Contributing

Contributions, ideas, and issues are welcome.

### 📄 License

MIT
