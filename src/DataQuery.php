<?php

namespace Ajthinking\DataQuery;

use Exception;

class DataQuery implements \ArrayAccess
{
	public function __construct(public $target){}

	public $stack = [];

	const MISSING_ARRAY_OPERATOR_MESSAGE = 'Array operation not supported';

	public static function in(mixed $target)
	{
		return new static($target);
	}

	public function get()
	{
		return collect($this->stack)->reduce(function($result, $step) {
			return is_array($step)
				? $this->resolveMethod($result, ...$step)
				: $this->resolveProperty($result, $step);
		}, $this->target);
	}

	public function __get($key)
	{
		array_push($this->stack, $key);

		return $this;
	}

	public function __call($key, $args)
	{
		array_push($this->stack, [$key, $args]);

		return $this;
	}

	protected function resolveMethod($target, $key, $args)
	{
		return $target->$key(...$args);
	}

	protected function resolveProperty($target, $key)
	{
		if(is_array($target)) return $target[$key];

		if(is_object($target)) return $target->$key;

		if($decoded = json_decode($target)) {
			return $this->resolveProperty($decoded, $key);
		}

		return null;
	}

    public function offsetExists(mixed $offset): bool {
        throw new Exception(static::MISSING_ARRAY_OPERATOR_MESSAGE);
    }

    public function offsetSet($offset, $value): void {
        throw new Exception(static::MISSING_ARRAY_OPERATOR_MESSAGE);
    }

    public function offsetGet($key) {
        return $this->__get($key);
    }

    public function offsetUnset($offset): void {
        throw new Exception(static::MISSING_ARRAY_OPERATOR_MESSAGE);
    }	
}
