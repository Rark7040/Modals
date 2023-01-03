<?php

declare(strict_types=1);

namespace rarkhopper\modals;

use JsonSerializable;

/**
 * @internal
 */
abstract class ElementBase implements JsonSerializable{
	protected string $name;
	/** @var array<string, string|int|float|array<string>> */
	protected array $element = [];

	public function __construct(string $name){
		$this->name = $name;
	}

	public function getName() : string{
		return $this->name;
	}

	public function jsonSerialize(){
		return $this->element;
	}
}
