<?php

declare(strict_types=1);

namespace rarkhopper\modals;

/**
 * @internal
 */
abstract class ElementBase{
	protected string $name;
	/** @var array<string, mixed> | array<array<string, mixed>> */
	protected array $element = [];

	public function __construct(string $name){
		$this->name = $name;
	}

	public function getName() : string{
		return $this->name;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function getElement() : array{
		return $this->element;
	}
}
