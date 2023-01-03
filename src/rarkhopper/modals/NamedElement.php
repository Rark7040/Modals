<?php

declare(strict_types=1);

namespace rarkhopper\modals;

/**
 * @internal
 */
class NamedElement extends ElementBase{
	private string $name;

	public function __construct(string $name){
		$this->name = $name;
	}

	public function getName() : string{
		return $this->name;
	}
}
