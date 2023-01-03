<?php

declare(strict_types=1);

namespace rarkhopper\modals\custom\element;

interface ICustomFormOption{
	public function getName() : string;
	/**
	 * @return string|int|bool|array<string, mixed>
	 */
	public function getElement() : array|string|int|bool;
}
