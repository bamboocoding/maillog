# Bamboo Laravel Email Log

A simple database logger for all outgoing emails sent by Laravel website.

# Installation

## Step 1: Composer

Laravel Email Database Log can be installed via [composer](http://getcomposer.org) by running this line in terminal:

```bash
composer require bamboocoding/maillog
```

## Step 2: Migration

Run this in terminal:
```bash
php artisan migrate
```

# Usage

After installation, any email sent by your website will be logged to `email_log` table in the site's database.
