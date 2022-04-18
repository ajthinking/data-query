
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Query spagetti data structures :spaghetti:
Access properties and methods of unreliable formats. Supports objects, arrays, JSON in any mix.

## Installation
```bash
composer require ajthinking/data-query
```
## Usage

```php
use Ajthinking\DataQuery\DataQuery;

DataQuery::in($spaghetti)
	->prop1
	->prop2
	['prop 3']
	->method('some arg')
	->get(); // result or null
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
