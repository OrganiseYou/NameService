# Name service
This is a library that convert the names that are used in projects.

## Add service to an project
```
composer req organiseyou/name-service
```

## Usage
### Convert an name from url to an internal name
```
$internalName = Organiseyou\NameService\ConvertService::urlToName($name);
```
### Convert an friendly written name to an internal name
```
$internalName = Organiseyou\NameService\ConvertService::saveConvert($name);
```
### Convert an internal name to an url friendly name
```
$urlFriendlyName = ConvertService::convertNameToId($internalName);
```

## Run tests
To run the tests, first clone the project to an repository
```
git clone git@github.com:OrganiseYou/NameServiceBundle.git
```
And go to the directory
```
cd NameServiceBundle
```
Run composer install
```
php ./vendor/bin/phpunit tests
```
