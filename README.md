# Laravel OXXA

Laravel wrapper for OXXA API

### Table of contents
- [Installation](#installation)
- [TODO](#todo)
### Installation
Install package with composer:
```
composer require graphicgenie/laravel-oxxa
```
Publish config file
```
php artisan vendor:publish --provider="GraphicGenie\LaravelOxxa\LaravelOxxaServiceProvider" --tag="config"
```
Set SIDN config in your .env file
```
OXXA_TEST
OXXA_USERNAME
OXXA_PASSWORD
```
### TODO
```
Write tests
```

php artisan vendor:publish --provider="GraphicGenie\LaravelOxxa\LaravelOxxaServiceProvider" --tag="config"