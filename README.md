# Name service
This is a library that convert the names that are used in projects.

## Add service to an project
```
composer req organiseyou/name-service
```

## Usage
### Use it the service
```php
$service = new Service('organise_you');

$capitals = $service->toDatabase();
//where $value is ORGANISE_YOU

$capitals = $service->toSlug();
//where $value is organise-you

$capitals = $service->toPascalCase();
//where $value is OrganiseYou

$capitals = $service->toCamelCase();
//where $value is organiseYou
```

#### Overwrite the default transformer
Sometimes we need to overwrite the default transformer
```php
$service = new Service(
    'organise-you',
    fn (string $slug) => ConvertService::urlToName($slug)
);

$value = $service->toDatabase()
// where $value is ORGANISE_YOU
```
### Use the static functions
#### Convert an name from url to an internal name
```
$internalName = Organiseyou\NameService\ConvertService::urlToName($name);
```
#### Convert an friendly written name to an internal name
```
$internalName = Organiseyou\NameService\ConvertService::saveConvert($name);
```
### Convert an internal name to an url friendly name
```
$urlFriendlyName = ConvertService::convertNameToId($internalName);
```
### Convert an internal name to a camelcase name
```
$camelCase = ConvertService::toCamelCase($internalName);
```

## Run tests
To run the tests, first clone the project to an repository
```
git clone git@github.com:OrganiseYou/NameService.git
```
And go to the directory
```
cd NameService
```
Run composer install
```
php ./vendor/bin/phpunit tests
```

## Upgrade v1 to v2
I did changed the class name, change the use case from
```php
use Organiseyou\NameService\ConvertService;
```
to
```php
use Organiseyou\NameService\Convert as ConvertService;
```
And remove ``Organiseyou\NameService`` and it is backwards compatible.