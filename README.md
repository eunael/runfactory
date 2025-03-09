# Run Factory

This Laravel package allows you to run your factories via artisan commands.

## Instalation

1. Add the repository in `composer.json`:
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/eunael/runfactory"
    }
]
```
2. Add the package as your **dev dependency**:
```
"eunael/run-factory": "dev-main"
```
3. Update your dependencies:
```
composer update
```

## Usage

Run the artisan command:
```
php artisan factory:run {factoryName} {count}
```
If you run without passing any arguments, display a searchable list of all application factories to select one. Next, it will ask how many records should be generated.
