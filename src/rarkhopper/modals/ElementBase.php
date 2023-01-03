<?php

declare(strict_types=1);

namespace rarkhopper\modals;

/**
 * @internal
 */
abstract class ElementBase{
	/** @var array<string, mixed> | array<array<string, mixed>> */
	protected array $element = [];

	/**
	 * @return string|int|bool|array<string, mixed>
	 */
	public function getElement() : array|string|int|bool{
		return $this->element;
	}
}
