<?php

namespace Ajthinking\DataQuery\Tests\Support;

class Car
{
	protected string $color = 'green';

	public function getColor($append = '')
	{
		return $this->color . $append;
	}
}