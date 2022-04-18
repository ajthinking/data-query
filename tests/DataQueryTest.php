<?php

use Ajthinking\DataQuery\DataQuery;
use Ajthinking\DataQuery\Tests\Support\Car;

describe("#it", function() {
	it('returns an instance', function () {
		expect(DataQuery::in(null))->toBeInstanceOf(DataQuery::class);
	});
});

describe("#get", function() {
	it('can retreive result using arrow access', function () {
		$data = ['key' => 'value'];
		$query = DataQuery::in($data);
		$result = $query->key->get();

		expect($result)->toBe('value');
	});

	it('can retrieve result using array access', function () {
		$data = ['key with space' => 'value'];
		$query = DataQuery::in($data);
		$result = $query['key with space']->get();

		expect($result)->toBe('value');
	});	

	it('can retreive result using method access', function () {
		$data = new Car;
		$query = DataQuery::in($data);
		$result = $query->getColor(append: '!')->get();

		expect($result)->toBe('green!');
	});

	it('can retreive result when data is json', function () {
		$data = '{"key": "value"}';
		$query = DataQuery::in($data);
		$result = $query->key->get();

		expect($result)->toBe('value');
	});	

	it('can retreive result when nested and mixed types', function () {
		$data = ['car' => ['engine' => '{"cylinders": 8}']];
		$query = DataQuery::in($data);
		$result = $query->car->engine->cylinders->get();

		expect($result)->toBe(8);
	});

	it('returns null if the path cant be resolved', function() {
		$data = null;
		$query = DataQuery::in($data);
		$result = $query->a->b->c->get();

		expect($result)->toBe(null);
	});
});