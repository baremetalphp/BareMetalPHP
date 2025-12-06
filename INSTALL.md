# Installation Instructions

This package is designed to be used with `composer create-project`.

## Quick Start

```bash
composer create-project elliotanderson/baremetal my-app
cd my-app
php mini migrate
php mini serve
```

## Local Development Setup

If you're developing the framework locally and want to test project creation:

```bash
# From the framework root
composer create-project elliotanderson/baremetal my-app \
  --repository='{"type":"path","url":"./baremetal-skeleton"}'
```

## What Gets Installed

- Complete application structure
- Default User model and migration
- Welcome page
- Configuration files
- Development server setup

After installation, follow the README.md in your new project directory.
