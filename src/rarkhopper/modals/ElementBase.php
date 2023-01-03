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
	 * @return array<string, mixed>
	 */
	public function getElement() : array{
		return $this->element;
	}
}
