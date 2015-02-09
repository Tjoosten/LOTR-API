Lord of the rings - API
=========================

## Getting started

```bash
# Download composer
curl -s https://getcomposer.org/installer | php

# Install project depecies
php composer.phar install
```

Edit the database configuratio in `app/config.php` to match your sessings.

Now set your server's document root to the `public/` directory.

## Database Migration and Seeding

The novice script provides a primitive means of migrating and seeding the database. Follow the `UserMagration.php` and
`UserSeed.ophp` templates located in `app/database/` for your own migration/seeds.

To migrate and seed your database:

```php
# Migrate
php novice migrate

# Seed
php novice seed

# Migrate then seed
php novice migrate --seed
```

**Note** These just run whatever is in the `run()` function of each seed or migration. There's no support for updating or rolling back unless you put it there.
