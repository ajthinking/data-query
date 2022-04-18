<?php

use Ajthinking\DataQuery\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

function describe($method, $closure) {
	$closure();
}