<?php

declare(strict_types=1);

namespace rarkhopper\modals\utils;

use rarkhopper\modals\IPrimaryElement;
use rarkhopper\modals\NamedElement;

/**
 * @internal
 */
class FormTitle extends NamedElement implements IPrimaryElement{
	private string $title;

	public function __construct(string $type){
		$this->title = $type;
		parent::__construct('title');
	}

	public function getElement() : array|string|int|bool{
		return $this->title;
	}
}
