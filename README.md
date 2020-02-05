# StartBox Schema

Here lives the source of StartBox migrations, seeds & factories.

### Workflow

Any changes or additions to the schema for any projects happen in this repository.

Clone & PR code to this repository and communicate the change with affected teams.

### Installation

Add the following to your `require` section of composer:
```json
"surgicallabs/sb_schema": "*",
```

Add the following to the `repositories` section of composer:
```json
"repositories": [
    {
        "type": "vcs",
        "url": "git@bitbucket.org:surgicallabs/sb_schema.git"
    }
],
```
Note: `repositories` isn't a default section, may need to add it.

### Migrations

The migrations are ready to use upon composer installing:

```
php artisan migrate
```

### Seeding

Seeders in `src/seeds` can be referenced in other projects like so:

```php
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(\StartBox\Schema\Seeds\Api::class);
        $this->call(\StartBox\Schema\Seeds\Admin::class);
    }
}
```

Note: These have to be manually added to your projects.

Afterwards run the seed command as you normally would:

```
php artisan db:seed
```

### Factories

Factories in this package get loaded automatically.

So you can use them in tests as you normally would:

```php
factory(\App\Models\User::class)->create();
```

Note: this requires the project to have a `/app/models` directory.
