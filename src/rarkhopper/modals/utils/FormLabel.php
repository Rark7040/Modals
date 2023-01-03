<?php

declare(strict_types=1);

namespace rarkhopper\modals\utils;

use rarkhopper\modals\PrimaryElement;

class FormLabel extends PrimaryElement{
	private string $label;

	public function __construct(string $label){
		$this->label = $label;
		parent::__construct('content');
	}

	public function getElement() : array|string|int|bool{
		return $this->label;
	}
}
