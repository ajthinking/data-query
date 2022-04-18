# Query spaghetti data structures :spaghetti:
Access properties and methods in uncertain PHP data structures. Supports object and array access and can forward method calls. It automatically interprets the underlying data structure (JSON, array or object) and simply gives you the (nested) result.

## Installation
```bash
composer require ajthinking/data-query
```
## Usage

```php
use Ajthinking\DataQuery\DataQuery;

DataQuery::in($spaghetti)
	->prop
	->method('some arg')    
	->nestedProp
	['deep nested prop with spaces']
	->get(); // result or null
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)
