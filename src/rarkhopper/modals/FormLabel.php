<?php

declare(strict_types=1);

namespace rarkhopper\modals;

class FormLabel extends PrimaryElement implements ISingleElement{
	private string $label;

	public function __construct(string $label = ''){
		$this->label = $label;
		parent::__construct('content');
	}

	public function getParameter() : string|int|bool{
		return $this->label;
	}
}