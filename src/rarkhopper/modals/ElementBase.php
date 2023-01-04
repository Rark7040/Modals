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
	 * @return array<string, mixed>|string|int|bool フォームをjson化したときに小要素となる値
	 */
	public function getElement() : array|string|int|bool{
		return $this->element;
	}
}
